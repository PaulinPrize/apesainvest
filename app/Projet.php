<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
	protected $table = 'projets';
	
    protected $fillable = [
        'user_id', 'categorie_id', 'nom_du_projet', 'photo_projet', 'enonce_du_defi', 'objectifs_du_projet', 'somme_a_recolter', 'somme_recoltee', 'duree_recolte', 'membre_un', 'fonction_membre_un', 'cv_membre_un', 'membre_deux', 'fonction_membre_deux', 'cv_membre_deux', 'membre_trois', 'fonction_membre_trois', 'cv_membre_trois', 'date_debut_mise_en_oeuvre', 'date_fin_mise_en_oeuvre', 'planning', 'resultats_finaux', 'statut', 'clicks', 'limit',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function categorie(){
    	return $this->belongsTo(Categorie::class);
	}  

    public function uploads(){
        return $this->belongsTo(Upload::class);
    }
}
