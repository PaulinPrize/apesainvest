<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'nom', 'slug','photo_categorie',
    ];

    public function projets(){
        return $this->hasMany(Projet::class);
    }
}
