<?php

namespace App\Http\Controllers;
use App\Projet;
use Illuminate\Http\Request;
use App\Repositories\ProjetRepository;
use App\Repositories\CategorieRepository;
use App\Categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $projetRepository;
    protected $nbrPages = 8;
    protected $categorieRepository;
    protected $nbrParPages = 6;

    public function __construct(ProjetRepository $projetRepository, CategorieRepository $categorieRepository)
    {
        $this->projetRepository = $projetRepository;
        $this->categorieRepository = $categorieRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $projets = Projet::all();
        return view('welcome', compact('projets', 'links'));
    }*/

    // Renvoyer tous les projets et toutes les catégories
    public function index()
    {
        /* Renvoyer tous les projets
        $projets = $this->projetRepository->getPaginate($this->nbrPages); */
        // Renvoyer les projets actifs
        $projets = DB::table('projets')->select('projets.id', 'name', 'photo', 'photo_projet', 'nom_du_projet', 'enonce_du_defi', 'somme_recoltee', 'somme_a_recolter', 'date_fin_mise_en_oeuvre')->join('users', 'projets.user_id', '=', 'users.id')->where('statut', '=', 1)->paginate(8);
        // Renvoyer toutes les catégories
        $categories = $this->categorieRepository->getPaginate($this->nbrParPages);
        return view('welcome', compact('projets', 'links','categories'));    
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
