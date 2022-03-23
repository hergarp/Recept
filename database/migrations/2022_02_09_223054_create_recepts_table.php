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
            $table->increments('r_id');
            $table->string('url_slug')->length(50)->unique();
            $table->unsignedBigInteger('user')->nullable();
            $table->string('megnevezes')->length(50)->unique();
            $table->string('kep')->unique();
            $table->string('kategoria')->length(30)->nullable();
            $table->string('konyha')->length(30)->nullable();
            $table->tinyInteger('adag');
            $table->mediumInteger('elokeszitesi_ido')->nullable();
            $table->mediumInteger('fozesi_ido')->nullable();
            $table->mediumInteger('sutesi_ido')->nullable();
            $table->string('fogas')->length(20)->nullable();
            $table->string('konyhatechnologia')->length(20)->nullable();
            $table->string('babakonyha')->length(30)->nullable();
            $table->Text('egyeb_elnevezesek')->length(200)->nullable();
            $table->mediumInteger('receptkonyvben')->default('0');
            $table->mediumInteger('ossznezettseg')->default('0');  
            $table->boolean('reggeli')->default(0);
            $table->boolean('tizorai')->default(0);
            $table->boolean('ebed')->default(0);
            $table->boolean('uzsonna')->default(0);
            $table->boolean('vacsora')->default(0);
            $table->boolean('tavasz')->default(0);
            $table->boolean('nyar')->default(0);
            $table->boolean('osz')->default(0);
            $table->boolean('tel')->default(0);
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
