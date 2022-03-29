<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptkonyvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptkonyvs', function (Blueprint $table) {
            $table->increments('rk_id', 11);
            $table->unsignedBigInteger('user')->index();
            $table->unsignedInteger('recept')->index();
            $table->boolean('jelzes')->default(0);
            $table->tinyInteger('minosites')->default(0);
            $table->timestamps();
            $table->unique(array('user', 'recept'));


            $table->foreign('user')->references('id')->on('users')
                ->constraints()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('recept')->references('r_id')->on('recepts')
                ->constraints()
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
        Schema::dropIfExists('receptkonyvs');
    }
}
