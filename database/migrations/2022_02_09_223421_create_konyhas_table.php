<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Konyha;

class CreateKonyhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konyhas', function (Blueprint $table) {
            $table->char('konyha', 30)->unique();
            $table->timestamps();
        });

        Konyha::create(['konyha' => 'afrikai']);
        Konyha::create(['konyha' => 'amerikai']);
        Konyha::create(['konyha' => 'angol']);
        Konyha::create(['konyha' => 'arab']);
        Konyha::create(['konyha' => 'ausztrál']);
        Konyha::create(['konyha' => 'belga']);
        Konyha::create(['konyha' => 'bolgár']);
        Konyha::create(['konyha' => 'cseh']);
        Konyha::create(['konyha' => 'dél-amerikai']);
        Konyha::create(['konyha' => 'erdélyi']);
        Konyha::create(['konyha' => 'francia']);
        Konyha::create(['konyha' => 'fúziós']);
        Konyha::create(['konyha' => 'görög']);
        Konyha::create(['konyha' => 'holland']);
        Konyha::create(['konyha' => 'horvát']);
        Konyha::create(['konyha' => 'indiai']);
        Konyha::create(['konyha' => 'japán']);
        Konyha::create(['konyha' => 'kínai']);
        Konyha::create(['konyha' => 'lengyel']);
        Konyha::create(['konyha' => 'magyar']);
        Konyha::create(['konyha' => 'máltai']);
        Konyha::create(['konyha' => 'mexikói']);
        Konyha::create(['konyha' => 'német']);
        Konyha::create(['konyha' => 'olasz']);
        Konyha::create(['konyha' => 'orosz']);
        Konyha::create(['konyha' => 'osztrák']);
        Konyha::create(['konyha' => 'pakisztáni']);
        Konyha::create(['konyha' => 'portugál']);
        Konyha::create(['konyha' => 'skandináv']);
        Konyha::create(['konyha' => 'skót']);
        Konyha::create(['konyha' => 'spanyol']);
        Konyha::create(['konyha' => 'svájci']);
        Konyha::create(['konyha' => 'szerb']);
        Konyha::create(['konyha' => 'szlovák']);
        Konyha::create(['konyha' => 'szlovén']);
        Konyha::create(['konyha' => 'távol-keleti']);
        Konyha::create(['konyha' => 'török']);
        Konyha::create(['konyha' => 'zsidó']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konyhas');
    }
}
