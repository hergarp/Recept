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
            $table->id('l_id', 11);
            $table->id('r_id', 11);  
            $table->Text('lepes', 250);                      
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {

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
        Schema::dropIfExists('lepes');
    }
}
