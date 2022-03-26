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
            $table->set('allergen', ['milk', 'egg', 'laktose', 'sugar', 'gluten'])->length(6);
            $table->timestamps();
            $table->unique(array('alapanyag', 'allergen'));
            
            $table->foreign('alapanyag')->references('megnevezes')->on('alapanyags')
                ->constraints()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Allergen::create(['alapanyag' => 'kristálycukor', 'allergen' => 'sugar']);
        Allergen::create(['alapanyag' => 'porcukor', 'allergen' => 'sugar']);
        Allergen::create(['alapanyag' => 'vaj', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'vaj', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tojás', 'allergen' => 'egg']);
        Allergen::create(['alapanyag' => 'tojásfehérje', 'allergen' => 'egg']);
        Allergen::create(['alapanyag' => 'tojássárgája', 'allergen' => 'egg']);
        Allergen::create(['alapanyag' => 'főtt tojás', 'allergen' => 'egg']);
        Allergen::create(['alapanyag' => 'liszt', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'tejszín', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tejszín', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'tönkölybúza', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'bulgur', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'gersli', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'rozs', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'búzadara', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'háztartási keksz', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'kekszmorzsa', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'oreo keksz', 'allergen' => 'gluten']);
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
