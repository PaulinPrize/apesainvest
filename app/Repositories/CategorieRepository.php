<?php

namespace App\Repositories;
use App\Categorie;

class CategorieRepository extends ResourceRepository
{

    public function __construct(Categorie $categorie)
    {
        $this->model = $categorie;
    }
}