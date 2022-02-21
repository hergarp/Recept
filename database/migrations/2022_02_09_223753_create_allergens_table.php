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
            $table->char('elnevezes')->length(20)->unique();
            $table->timestamps();
        });

        Allergen::create(['elnevezes' => 'glutén']);
        Allergen::create(['elnevezes' => 'cukor']);
        Allergen::create(['elnevezes' => 'tej']);
        Allergen::create(['elnevezes' => 'tojás']);
        Allergen::create(['elnevezes' => 'laktóz']);
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
