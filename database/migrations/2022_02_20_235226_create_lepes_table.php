<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLepesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lepes', function (Blueprint $table) {
            $table->increments('l_id')->length(11);
            $table->unsignedInteger('r_id')->length(11);  
            $table->Text('lepes')->length(250);                      
            $table->timestamps();


            $table->foreign('r_id')->references('r_id')->on('recepts')
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
        Schema::dropIfExists('lepes');
    }
}
