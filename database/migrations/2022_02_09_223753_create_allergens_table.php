<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Midels\Allergen;

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
            $table->char('allergen', 20)->unique();
            $table->timestamps();
        });

        Allergen::create(['allergen' => 'glutén']);
        Allergen::create(['allergen' => 'cukor']);
        Allergen::create(['allergen' => 'tej']);
        Allergen::create(['allergen' => 'tojás']);
        Allergen::create(['allergen' => 'laktóz']);
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
