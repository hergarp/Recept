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
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedInteger('r_id')->index();
            $table->boolean('jelzes')->default(0);
            $table->tinyInteger('minosites')->length(1);
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')
                ->constraints()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('r_id')->references('r_id')->on('recepts')
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
