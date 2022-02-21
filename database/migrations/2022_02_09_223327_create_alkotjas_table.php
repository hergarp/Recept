<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlkotjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alkotjas', function (Blueprint $table) {
            $table->id('alk_id', 11);
            $table->id('r_id', 11);
            $table->id('am_id', 11);
            $table->tinyInteger('mennyiseg', 4);
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {

            $table->unsignedBigInteger('r_id');         
            $table->foreign('r_id')->references('r_id')->on('recept')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('alapanyag_mertekegyseg')
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
        Schema::dropIfExists('alkotjas');
    }
}
