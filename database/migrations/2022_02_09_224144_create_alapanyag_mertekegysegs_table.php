<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Alapanyag_mertekegyseg;

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
            $table->increments('am_id',11);
            $table->string('alapanyag')->length(30);                      
            $table->string('mertekegyseg')->length(20);  
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

        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'db', 'alapanyag' => 'eper']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ml', 'alapanyag' => 'eperszirup']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'cl', 'alapanyag' => 'eperszirup']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'dl', 'alapanyag' => 'eperszirup']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'l', 'alapanyag' => 'eperszirup']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ízlés szerint', 'alapanyag' => 'eperszirup']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ml', 'alapanyag' => 'ananászlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'cl', 'alapanyag' => 'ananászlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'dl', 'alapanyag' => 'ananászlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'l', 'alapanyag' => 'ananászlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ízlés szerint', 'alapanyag' => 'ananászlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ml', 'alapanyag' => 'citromlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'cl', 'alapanyag' => 'citromlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'dl', 'alapanyag' => 'citromlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'l', 'alapanyag' => 'citromlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ízlés szerint', 'alapanyag' => 'citromlé']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'bk', 'alapanyag' => 'pépesített eper']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'kk', 'alapanyag' => 'pépesített eper']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'tk', 'alapanyag' => 'pépesített eper']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ek', 'alapanyag' => 'pépesített eper']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ízlés szerint', 'alapanyag' => 'pépesített eper']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ml', 'alapanyag' => 'alkoholmentes pezsgő']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'cl', 'alapanyag' => 'alkoholmentes pezsgő']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'dl', 'alapanyag' => 'alkoholmentes pezsgő']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'l', 'alapanyag' => 'alkoholmentes pezsgő']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'ízlés szerint', 'alapanyag' => 'alkoholmentes pezsgő']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'db', 'alapanyag' => 'tojás']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'g', 'alapanyag' => 'vaj']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'dkg', 'alapanyag' => 'vaj']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'g', 'alapanyag' => 'cukor']);
        Alapanyag_mertekegyseg::create(['mertekegyseg' => 'dkg', 'alapanyag' => 'cukor']);
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
