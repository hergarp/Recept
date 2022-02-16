<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepts', function (Blueprint $table) {
            $table->char('url_slug', 50);
            $table->char('megnevezes', 50);
            $table->char('kep', 50);
            $table->char('kategoria', 30);
            $table->char('konyha', 30);
            $table->tinyInteger('adag', 2);
            $table->mediumInteger('elokeszitesi_ido', 3);
            $table->mediumInteger('fozesi_ido', 3);
            $table->mediumInteger('sutesi_ido', 3);
            $table->char('fogas', 20);
            $table->char('konyhatechnologi', 20);
            $table->char('babakonyha', 30);
            $table->Text('egyeb_elnevezesek', 200);
            $table->mediumInteger('receptkonyvben', 7);
            $table->mediumInteger('ossznezettseg', 7);  
            $table->date('feltoltes_datuma');
            $table->binary('reggeli');
            $table->binary('ebed');
            $table->binary('uzsonna');
            $table->binary('vacsora');
            $table->binary('tavasz');
            $table->binary('nyar');
            $table->binary('osz');
            $table->binary('tel');
            $table->char('statusz', 50);
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
         
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepts');
    }
}
