<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Mertekegyseg;

class CreateMertekegysegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mertekegysegs', function (Blueprint $table) {
            $table->string('mertekegyseg')->unique()->length(20);
            $table->timestamps();
        });

        Mertekegyseg::create(['mertekegyseg' => 'kk']);
        Mertekegyseg::create(['mertekegyseg' => 'tk']);
        Mertekegyseg::create(['mertekegyseg' => 'ek']);
        Mertekegyseg::create(['mertekegyseg' => 'csepp']);
        Mertekegyseg::create(['mertekegyseg' => 'citromból nyert']);
        Mertekegyseg::create(['mertekegyseg' => 'fél citromból nyert']);
        Mertekegyseg::create(['mertekegyseg' => 'ml']);
        Mertekegyseg::create(['mertekegyseg' => 'cl']);
        Mertekegyseg::create(['mertekegyseg' => 'dl']);
        Mertekegyseg::create(['mertekegyseg' => 'l']);
        Mertekegyseg::create(['mertekegyseg' => 'g']);
        Mertekegyseg::create(['mertekegyseg' => 'dkg']);
        Mertekegyseg::create(['mertekegyseg' => 'kg']);
        Mertekegyseg::create(['mertekegyseg' => 'késhegynyi']);
        Mertekegyseg::create(['mertekegyseg' => 'csipet']);
        Mertekegyseg::create(['mertekegyseg' => 'szál']);
        Mertekegyseg::create(['mertekegyseg' => 'ízlés szerint']);
        Mertekegyseg::create(['mertekegyseg' => 'csokor']);
        Mertekegyseg::create(['mertekegyseg' => 'bk']);
        Mertekegyseg::create(['mertekegyseg' => 'db']);
        Mertekegyseg::create(['mertekegyseg' => 'bögre']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mertekegysegs');
    }
}
