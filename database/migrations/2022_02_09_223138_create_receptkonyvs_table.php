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
            $table->id('rk_id', 11);
            $table->integer('user_id', 11);
            $table->id('r_id', 11);
            $table->boolean('jelzes')->default(0);
            $table->tinyInteger('minosites', 1);
            $table->timestamps();
        });
       Schema::table('posts', function (Blueprint $table) {
     
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
        $table->foreign('r_id')->references('id')->on('recept')
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
        Schema::dropIfExists('receptkonyvs');
    }
}
