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
            $table->increments('r_id')->length(11);
            $table->string('url_slug')->length(50)->unique();
            $table->unsignedBigInteger('user')->nullable();
            $table->string('megnevezes')->length(50)->unique();
            $table->string('kep')->length(50)->unique();
            $table->string('kategoria')->length(30)->nullable();
            $table->string('konyha')->length(30)->nullable();
            $table->tinyInteger('adag')->length(2);
            $table->mediumInteger('elokeszitesi_ido')->length(3);
            $table->mediumInteger('fozesi_ido')->length(3);
            $table->mediumInteger('sutesi_ido')->length(3);
            $table->string('fogas')->length(20);
            $table->string('konyhatechnologi')->length(20);
            $table->string('babakonyha')->length(30);
            $table->Text('egyeb_elnevezesek')->length(200);
            $table->mediumInteger('receptkonyvben')->length(7);
            $table->mediumInteger('ossznezettseg')->length(7);  
            $table->date('feltoltes_datuma');
            $table->binary('reggeli');
            $table->binary('ebed');
            $table->binary('uzsonna');
            $table->binary('vacsora');
            $table->binary('tavasz');
            $table->binary('nyar');
            $table->binary('osz');
            $table->binary('tel');
            $table->string('statusz')->length(15)->default('beküldött');
            $table->timestamps();


            $table->foreign('kategoria')->references('kategoria')->on('kategorias')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
         
            $table->foreign('konyha')->references('konyha')->on('konyhas')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('user')->references('id')->on('users')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
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
