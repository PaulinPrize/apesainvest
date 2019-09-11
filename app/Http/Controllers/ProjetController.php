<?php

namespace App\Http\Controllers;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ProjetCreateRequest;
use App\Http\Requests\ProjetUpdateRequest;
use App\Projet;
use View;
use App\Categorie;

class ProjetController extends Controller
{
    protected $projetRepository;
    protected $nbrPages = 8;

    /**
     * Create a new controller instance.
     * Constructeur
     *
     * @return void
     */
    public function __construct(ProjetRepository $projetRepository)
    {
        $this->middleware('auth');
        $this->projetRepository = $projetRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = $this->projetRepository->getPaginate($this->nbrPages); 
        $links = $projets->render();
        return view('projet/tous-les-projets', compact('projets', 'links')); 
    }

    public function mesProjets()
    {
        $projets = $this->projetRepository->getActiveOrderByDate($this->nbrPages);
        $links = $projets->render();
        return view('projet/mes-projets', compact('projets', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::get();
        return view('projet/ajouter', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->projetRepository->store($request); 
        return redirect('projet/all');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet = $this->projetRepository->getById($id);
        return view('projet/afficher-projet',  compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = $this->projetRepository->getById($id);

        return view('projet/modifier-projet',  compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetUpdateRequest $request, $id)
    {
        $this->projetRepository->update($id, $request->all()); 
        
        return redirect('projet/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->projetRepository->destroy($id);

        return redirect()->back();
    }


}
