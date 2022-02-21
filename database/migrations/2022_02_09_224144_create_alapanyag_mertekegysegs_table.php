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
            $table->char('mertekegyseg')->length(20);  
            $table->unsignedInteger('a_id')->length(11);                      
            $table->timestamps();


            $table->foreign('a_id')->references('a_id')->on('alapanyags')
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
