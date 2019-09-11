<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToSoutenirs extends Migration
{
    
    public function up()
    {
        Schema::table('soutenirs', function (Blueprint $table) {
            $table->string('phone')->after('moyen_paiement'); 
        });
    }
    
    public function down()
    {
        Schema::table('soutenirs', function (Blueprint $table) {
          $table->dropColumn('phone');
       });
    }
}
