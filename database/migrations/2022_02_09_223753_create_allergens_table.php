<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Allergen;

class CreateAllergensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergens', function (Blueprint $table) {
            $table->id('a_id', 11);
            $table->string('alapanyag')->length(30);
            $table->set('allergen', ['tej', 'tojás', 'laktóz', 'cukor', 'glutén'])->length(6);
            $table->timestamps();
            $table->unique(array('alapanyag', 'allergen'));
            
            $table->foreign('alapanyag')->references('megnevezes')->on('alapanyags')
                ->constraints()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Allergen::create(['alapanyag' => 'cukor', 'allergen' => 'cukor']);
        Allergen::create(['alapanyag' => 'vaj', 'allergen' => 'tej']);
        Allergen::create(['alapanyag' => 'vaj', 'allergen' => 'laktóz']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergens');
    }
}
