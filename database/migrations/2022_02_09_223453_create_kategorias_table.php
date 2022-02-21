<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Kategoria;

class CreateKategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorias', function (Blueprint $table) {
            $table->primary('kategoria', 30)->unique();
            $table->timestamps();
        });

        Kategoria::create(['kategoria' => 'aprósütemény']);
        Kategoria::create(['kategoria' => 'befőttek']);
        Kategoria::create(['kategoria' => 'bonbonok']);
        Kategoria::create(['kategoria' => 'édes keksz']);
        Kategoria::create(['kategoria' => 'édes krém']);
        Kategoria::create(['kategoria' => 'édes süti']);
        Kategoria::create(['kategoria' => 'torta']);
        Kategoria::create(['kategoria' => 'kelt tészta']);
        Kategoria::create(['kategoria' => 'kenyerek']);
        Kategoria::create(['kategoria' => 'töltött zöldség']);
        Kategoria::create(['kategoria' => 'tészta']);
        Kategoria::create(['kategoria' => 'egytálételek']);
        Kategoria::create(['kategoria' => 'köretek']);
        Kategoria::create(['kategoria' => 'kuglóf']);
        Kategoria::create(['kategoria' => 'tapas']);
        Kategoria::create(['kategoria' => 'lángos']);
        Kategoria::create(['kategoria' => 'lekváros-dzsemek']);
        Kategoria::create(['kategoria' => 'levesek']);
        Kategoria::create(['kategoria' => 'fagyi']);
        Kategoria::create(['kategoria' => 'fánk']);
        Kategoria::create(['kategoria' => 'szósz']);
        Kategoria::create(['kategoria' => 'felfújtak']);
        Kategoria::create(['kategoria' => 'főzelékek']);
        Kategoria::create(['kategoria' => 'szendvics']);
        Kategoria::create(['kategoria' => 'sós süti']);
        Kategoria::create(['kategoria' => 'halételek']);
        Kategoria::create(['kategoria' => 'húsételek']);
        Kategoria::create(['kategoria' => 'italok']);
        Kategoria::create(['kategoria' => 'muffin']);
        Kategoria::create(['kategoria' => 'palacsinta']);
        Kategoria::create(['kategoria' => 'péksütemény']);
        Kategoria::create(['kategoria' => 'pite']);
        Kategoria::create(['kategoria' => 'pizza']);
        Kategoria::create(['kategoria' => 'pogácsa']);
        Kategoria::create(['kategoria' => 'pörkölt']);
        Kategoria::create(['kategoria' => 'rétes']);
        Kategoria::create(['kategoria' => 'saláta']);
        Kategoria::create(['kategoria' => 'savanyúság']);
        Kategoria::create(['kategoria' => 'sós krémek']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategorias');
    }
}
