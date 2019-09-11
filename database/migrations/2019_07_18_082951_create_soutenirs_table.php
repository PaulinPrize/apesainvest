<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoutenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutenirs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                ->references('id')
                ->on('projets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('montant');
            $table->string('moyen_paiement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('projets', function(Blueprint $table) {
            $table->dropForeign('soutenirs_user_id_foreign');
        });  
        Schema::table('projets', function(Blueprint $table) {
            $table->dropForeign('soutenirs_projets_id_foreign');
        });*/
        Schema::dropIfExists('soutenirs');
    }
}
