<?php

namespace App\Repositories;
use App\Projet;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjetRepository extends ResourceRepository
{
    protected $projet;
    
    public function __construct(Projet $projet)
    {  
        $this->projet = $projet;
    }

    public function getPaginate($n)
    {
        return $this->projet->paginate($n);
    }

    public function getActiveOrderByDate($nbrPages)
    {
        return $this->queryActiveOrderByDate()->paginate($nbrPages);
    }

    protected function queryActiveOrderByDate()
    {
        return $this->projet
            ->select('id', 'nom_du_projet', 'categorie_id', 'created_at', 'updated_at', 'statut', 'clicks', 'photo_projet', 'user_id','somme_recoltee')
            ->where('user_id', Auth::user()->id)
            ->orderBy('projets.created_at', 'asc');
    }

    public function store($request)
    {
        $cv_membre_un = basename($request->cv_membre_un->store('img/projets/cv'));
        $cv_membre_deux = basename($request->cv_membre_deux->store('img/projets/cv'));
        $cv_membre_trois = basename($request->cv_membre_trois->store('img/projets/cv'));
        $planning = basename($request->planning->store('img/projets/planning'));
        $resultats_finaux = basename($request->resultats_finaux->store('img/projets/resultats_finaux'));
        // Save image  
        $path = basename ($request->photo_projet->store('img/projets/logo/images'));
        // Save thumb
        $image = InterventionImage::make($request->photo_projet)->resize(460,356)->encode();
        Storage::put ('img/projets/logo/thumbs/' . $path, $image);
        // Save in base
        $projet = new Projet;

        $projet->user_id = auth()->id();
        $projet->nom_du_projet = $request->nom_du_projet;
        $projet->categorie_id = $request->categorie_id; 
        $projet->photo_projet = $path;
        $projet->membre_un = $request->membre_un;
        $projet->fonction_membre_un = $request->fonction_membre_un;
        $projet->cv_membre_un = $cv_membre_un;
        $projet->membre_deux = $request->membre_deux;
        $projet->fonction_membre_deux = $request->fonction_membre_deux;        
        $projet->cv_membre_deux = $cv_membre_deux;
        $projet->membre_trois = $request->membre_trois;
        $projet->fonction_membre_trois = $request->fonction_membre_trois;
        $projet->cv_membre_trois = $cv_membre_trois;
        $projet->date_debut_mise_en_oeuvre = $request->date_debut_mise_en_oeuvre;
        $projet->date_fin_mise_en_oeuvre = $request->date_fin_mise_en_oeuvre;
        $projet->enonce_du_defi = $request->enonce_du_defi;
        $projet->objectifs_du_projet = $request->objectifs_du_projet;
        $projet->somme_a_recolter = $request->somme_a_recolter;
        $projet->planning = $planning;
        $projet->resultats_finaux = $resultats_finaux;
        $projet->statut = isset($request->statut); 

        $projet->save();
    }

    public function getById($id)
    {
        return $this->projet->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->getById($id)->update($inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    public function lastSouscription($id)
    {
        return DB::table('soutenirs')
                ->join('users', 'users.id', '=', 'soutenirs.user_id')
                ->select('name','photo','soutenirs.created_at as date','montant','country','commentaire')   
                ->where('soutenirs.project_id',$id)->get();
    }

    public function count_commentaire($id)
    {
       return DB::table('soutenirs')
                ->where('soutenirs.project_id',$id)
                ->where('commentaire','<>',null)
                ->count(); 
    }

    public function count_donation($id)
    {
       return DB::table('soutenirs')
                ->where('soutenirs.project_id',$id)
                ->count(); 
    }

    public function select_commentaire($id)
    {
       return DB::table('soutenirs')
                ->join('users', 'users.id', '=', 'soutenirs.user_id')
                ->select('name','photo','soutenirs.created_at as date','montant','country','commentaire')   
                ->where('soutenirs.project_id',$id)->get();
    }




}
