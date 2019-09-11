<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusFieldToSoutenirs extends Migration
{
    
    public function up()
    {
        Schema::table('soutenirs', function (Blueprint $table) {
            $table->string('country')->after('moyen_paiement');
            $table->string('boite_postal')->after('country')
                  ->nullable();
            $table->string('status')->after('boite_postal')
                  ->default('attente');
            $table->string('commentaire')->after('status')
                   ->nullable();
        });
    }

    
    public function down()
    {
       Schema::table('soutenirs', function (Blueprint $table) {
          $table->dropColumn('status');
          $table->dropColumn('country');
          $table->dropColumn('boite_postal');
          $table->dropColumn('commentaire');
       });
    }
}
