<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjetRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DonationRequest;
use App\Soutenirs;
use Illuminate\Support\Facades\Input;
use Mail;

class ProjectController extends Controller
{
    protected $projetRepository;


    public function __construct(ProjetRepository $projetRepository)
    {
        $this->projetRepository = $projetRepository;
    }


    public function show_project($id)
    {
        $projet = $this->projetRepository->getById($id);
        $query = DB::table('categories')->select('nom')
    	      ->where('id' ,$projet->id)
    	      ->get();

    	foreach ($query as  $value) {
       	 
       	 $categorie =  $value->nom;
        }
         /* montant deja perçu */
        $montant_recolte = $projet->somme_recoltee;
        /* montant à collecter */
        $montant_a_recolter = $projet->somme_a_recolter;
       
        /*calcul du pourcentage en recuperant l'entier suivant*/
        $pourcentage = floor(($montant_recolte/$montant_a_recolter) * 100);

        /* recuperer les souscriptions recentes d'un projet */
        $last_donation = $this->projetRepository->lastSouscription($id);
        /** recuperer le nombre de commentaire **/
        $comments = $this->projetRepository->count_commentaire($id);
        $donation = $this->projetRepository->count_donation($id);
        $commentaires = $this->projetRepository->select_commentaire($id);

        return view('projet/project-details',compact('projet','categorie','pourcentage','last_donation','comments','donation','commentaires'));
        
    }

    public function soutenir($id,$name)
    {
    	 return redirect()->route('project.donate',[$id,$name]);
    }

    public function donate($id,$name)
    {
    	$projet = $this->projetRepository->getById($id);
    	$pourcentage = $this->calcul_pourcentage($projet->somme_recoltee,$projet->somme_a_recolter);

    	$nom = Auth::user()->name;
    	$photo = Auth::user()->photo;
    	$email = Auth::user()->email;
    	$phone = Auth::user()->phone;
       
        /* requete qui recupere la liste des pays*/
    	$liste_pays = DB::table('tc_pays')->select('Commo_Name','ISO_3166_1_2_Letter_Code')->get();

    	return view('projet.donation',compact('projet','pourcentage','nom','photo','email','phone','liste_pays','id','name'));
    	
    }

    private function calcul_pourcentage($montant_recolte,$montant_a_recolter)
    {
        /*calcul du pourcentage en recuperant l'entier suivant*/
        $pourcentage = floor(($montant_recolte/$montant_a_recolter) * 100);
        return $pourcentage;
    }

    public function subscription(DonationRequest $request)
    {
       	$subscribe = array(
    		'id' => $request->id,
    		'name' => $request->name,
    		'montant' => $request->inputMontant,
    		'nom' => $request->inputName,
    		'email' => $request->inputEmail,
    		'phone' => $request->telephone,
    		'pays' => $request->inputPays,
    		'comment' => $request->comment,
    		'postal' => $request->inputPostal,
    	);
    	return view('projet.subscriber',compact('projet','subscribe'));
    }

    /* insertion de la contribution avec tous les elements dans la bd*/

    public function donation()
    {
    	$project_id = Input::get('project_id');
    	$montant = Input::get('montant');
    	$moyen_paiement = Input::get('moyen');
    	$country = Input::get('country');
    	$comment = Input::get('comment');
    	$phone = Input::get('phone');
    	$boite_postal = Input::get('boite_p');
    	$email = Input::get('email');

    	$soutenirs = new Soutenirs();
    	$soutenirs->project_id = $project_id;
    	$soutenirs->user_id = Auth::user()->id;
    	$soutenirs->montant = $montant;
    	$soutenirs->moyen_paiement = $moyen_paiement;
    	$soutenirs->country = $country;
    	$soutenirs->commentaire = $comment;
    	$soutenirs->phone = $phone;
    	$soutenirs->boite_postal = $boite_postal;
    	$soutenirs->save();

        /* recuoere qui recupere le nom du projet */

        $query = DB::table('projets')->select('nom_du_projet')
    	      ->where('id' ,$project_id)
    	      ->get();
        foreach ($query as  $value) {
       	 
       	 $name_project =  $value->nom_du_projet;
        }
    	/* tableau d'elements à transmettre a la fonction Mail */

    	$element = array(
    		'nom' => Auth::user()->name,
    		'name_project' => $name_project,
    		'montant' => $montant,
    	);
        
        /* envoi du mail au concerne */
        /*Mail::send('projet.project-mail_investisseur',$element, function($message) 
        {
          $message->to('lebresilienpepita@gmail.com')->subject('CONFIRMATION DE SOUSCRIPTION');
        });*/

    	return response()->json($soutenirs);

    }


}
