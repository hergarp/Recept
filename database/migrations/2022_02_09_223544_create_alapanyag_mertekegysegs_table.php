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
            $table->primary('am_id', 11);
            $table->char('mertekegyseg', 10);  
            $table->id('a_id', 11);                      
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {

             $table->foreign('a_id')->references('id')->on('alapanyag')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('mertekegyseg')->references('mertekegyseg')->on('mertekegyseg')
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
