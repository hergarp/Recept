<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlapanyagMertekegysegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alapanyag_mertekegysegs', function (Blueprint $table) {
            $table->increments('am_id')->length(11);
            $table->string('mertekegyseg')->length(20);  
            $table->string('alapanyag')->length(30);                      
            $table->timestamps();
            $table->unique(array('mertekegyseg', 'alapanyag'));


            $table->foreign('alapanyag')->references('megnevezes')->on('alapanyags')
               ->constrained()
               ->onUpdate('cascade')
               ->onDelete('cascade');
    
            $table->foreign('mertekegyseg')->references('mertekegyseg')->on('mertekegysegs')
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
        Schema::dropIfExists('alapanyag_mertekegysegs');
    }
}
