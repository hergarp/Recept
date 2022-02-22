<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlapanyagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alapanyags', function (Blueprint $table) {
            $table->increments('a_id')->length(11)->unique();
            $table->string('megnevezes')->length(30)->unique();
            $table->char('allergen', 20);            
            $table->timestamps();

            $table->foreign('allergen')->references('elnevezes')->on('allergens')
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
        Schema::dropIfExists('alapanyags');
    }
}
