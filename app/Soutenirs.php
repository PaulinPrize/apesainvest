<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soutenirs extends Model
{
     protected $fillable = [
        'project_id','user_id','montant','moyen_paiement','country','boite_postal','status','commentaire',
    ];
}
