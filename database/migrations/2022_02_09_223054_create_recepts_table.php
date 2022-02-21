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
            $table->primary('r_id', 11);
            $table->char('url_slug')->length(50);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->char('kep')->length(50);
            $table->char('kategoria')->length(30);
            $table->char('konyha')->length(30);
            $table->tinyInteger('adag')->length(2);
            $table->mediumInteger('elokeszitesi_ido')->length(3);
            $table->mediumInteger('fozesi_ido')->length(3);
            $table->mediumInteger('sutesi_ido')->length(3);
            $table->char('fogas')->length(20);
            $table->char('konyhatechnologi')->length(20);
            $table->char('babakonyha')->length(30);
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
            $table->char('statusz')->length(50);
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
         
            $table->foreign('kategoria')->references('kategoria')->on('kategoria')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
         
            $table->foreign('konyha')->references('konyha')->on('konyha')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('recepts');
    }
}
