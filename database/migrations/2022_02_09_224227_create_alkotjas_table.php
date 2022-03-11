<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlkotjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alkotjas', function (Blueprint $table) {
            $table->increments('alk_id')->length(11)->unique();
            $table->unsignedInteger('recept')->length(11);
            $table->unsignedInteger('alapanyag_mertekegyseg')->length(11);
            $table->tinyInteger('mennyiseg')->length(4)->nullable();
            $table->timestamps();
            $table->unique(array('recept', 'alapanyag_mertekegyseg', 'mennyiseg'));


            $table->foreign('recept')->references('r_id')->on('recepts')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
    
            $table->foreign('alapanyag_mertekegyseg')->references('am_id')->on('alapanyag_mertekegysegs')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alkotjas');
    }
}
