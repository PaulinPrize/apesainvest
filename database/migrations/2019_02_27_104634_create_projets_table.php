<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();  
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            

            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->timestamps();     

            $table->string('nom_du_projet');
            $table->string('photo_projet');
            $table->string('enonce_du_defi', 255);
            $table->string('objectifs_du_projet', 255);
            $table->integer('somme_a_recolter');
            $table->datetime('date_debut_mise_en_oeuvre');
            $table->datetime('date_fin_mise_en_oeuvre');
            $table->integer('somme_recoltee')->default(0);
            $table->string('membre_un');
            $table->string('fonction_membre_un');
            $table->string('cv_membre_un');
            $table->string('membre_deux');
            $table->string('fonction_membre_deux');
            $table->string('cv_membre_deux');
            $table->string('membre_trois');
            $table->string('fonction_membre_trois');
            $table->string('cv_membre_trois');
            
            
            $table->string('planning');
            $table->string('resultats_finaux');
            /* Champ booléen pour savoir si le projet est en cours  ou terminé */
            $table->boolean('statut')->default(false);
            /* Entier pour compter les clics sur le projet */
            $table->integer('clicks')->unsigned()->default(0);
            /* La date limite de la publication */
            $table->date('limit')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
}


