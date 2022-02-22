<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUzenetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uzenets', function (Blueprint $table) {
            $table->increments('m_id')->length(11);
            $table->unsignedInteger('recept')->length(11);  
            $table->Text('uzenet')->length(250);                      
            $table->timestamps();


            $table->foreign('recept')->references('r_id')->on('recepts')
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
        Schema::dropIfExists('uzenets');
    }
}
