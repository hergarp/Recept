<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Alapanyag;

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
            $table->string('megnevezes')->length(30)->unique();
            $table->timestamps();
        });

        Alapanyag::create(['megnevezes' => 'eper']);
        Alapanyag::create(['megnevezes' => 'eperszirup']);
        Alapanyag::create(['megnevezes' => 'ananászlé']);
        Alapanyag::create(['megnevezes' => 'citromlé']);
        Alapanyag::create(['megnevezes' => 'grapefruitlé']);
        Alapanyag::create(['megnevezes' => 'pépesített eper']);
        Alapanyag::create(['megnevezes' => 'alkoholmentes pezsgő']);
        Alapanyag::create(['megnevezes' => 'tojás']);
        Alapanyag::create(['megnevezes' => 'vaj']);
        Alapanyag::create(['megnevezes' => 'cukor']);
        Alapanyag::create(['megnevezes' => 'liszt']);
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
