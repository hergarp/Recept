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
            $table->set('allergen', ['milk', 'egg', 'laktose', 'sugar', 'gluten', 'animal'])->length(7);
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
        Allergen::create(['alapanyag' => 'író', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'író', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'tejpor', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tejpor', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'sűrített tej (cukrozott)', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'sűrített tej (cukrozott)', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'sovány tejpor (cukrozott)', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'sovány tejpor (cukrozott)', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'savó', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'savó', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'túró rudi', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'túró rudi', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'túródesszert', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'túródesszert', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'joghurt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'joghurt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'kefir', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'aludttej', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'aludttej', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'görög joghurt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'görög joghurt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'kaukázusi kefir', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'gyümölcsjoghurt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'gyümölcsjoghurt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'juhkefir', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'kecskejoghurt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'kecskejoghurt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'skyr', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'skyr', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'parmezán sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'parmezán sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'kecskesajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'kecskesajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'mozzarella', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'mozzarella', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'mascarpone', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'mascarpone', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'feta sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'feta sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'gruyére sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'gruyére sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'gomolya sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'gomolya sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'juhsajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'juhsajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'scamorza', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'scamorza', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'halloumi sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'halloumi sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'kéksajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'kéksajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'camembert sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'camembert sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'fromage frais', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'fromage frais', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'krémsajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'krémsajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'grana padano', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'gorgonzola', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'gorgonzola', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'cheddar sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'cheddar sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'edami sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'edami sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'ementáli sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'ementáli sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'trappista sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'trappista sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'füstölt sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'füstölt sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'tömlős krémsajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tömlős krémsajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'lapkasajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'lapkasajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'pecorino sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'pecorino sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'marinált feta', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'marinált feta', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'raklett sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'raklett sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'orda', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'orda', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'parenyica sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'parenyica sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'kockasajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'kockasajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'brie sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'brie sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'laktózmentes sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'rántott sajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'rántott sajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'krémfehérsajt', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'krémfehérsajt', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'tejföl', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tejföl', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'crème fraîche', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'crème fraîche', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'dupla tejszín', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'dupla tejszín', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'habtejszín', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'habtejszín', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'főzőtejszín', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'főzőtejszín', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'tejszínhab', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tejszínhab', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'kávétejszín', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'kávétejszín', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'ricotta', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'ricotta', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'tehéntúró', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tehéntúró', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'juhtúró', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'juhtúró', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'gomolyatúró', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'gomolyatúró', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'cottage cheese', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'cottage cheese', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'krémtúró', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'krémtúró', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'sovány túró', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'sovány túró', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'körözött', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'körözött', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'laktózmentes túró', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'vaj', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'vaj', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'ghee', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'ghee', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'teavaj', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'teavaj', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'vajkrém', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'vajkrém', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'fűszervaj', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'fűszervaj', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'szendvicskrém', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'szendvicskrém', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'tej', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'tej', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'sovány tej', 'allergen' => 'laktose']);
        Allergen::create(['alapanyag' => 'sovány tej', 'allergen' => 'milk']);
        Allergen::create(['alapanyag' => 'laktózmentes tej', 'allergen' => 'milk']);
        
        //tészták
        Allergen::create(['alapanyag' => 'tarhonya', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'csuszatészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'csigatészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'hosszúmetélt', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'szarvacska tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'rizstészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'udon tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'üveg tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'ázsiai tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'kínai tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'spatzle tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'soba tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'gyufatészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'cérnametélt', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'eperlevél tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'levesgyöngy', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'gnocchi', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'cannelloni', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'lasagne tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'spagetti tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'penne', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'makaróni', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'farfalle', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'fusilli tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'rigatoni tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'zöld metélttészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'kagylótészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'orecchiette tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'tagliatelle', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'orzo', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'tészta', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'tortellini', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'sonkás tortellini', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'sonkás tortellini', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'sajtos tortellini', 'allergen' => 'gluten']);
        Allergen::create(['alapanyag' => 'sajtos tortellini', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'tortelloni', 'allergen' => 'gluten']);
        //tészták vége
        
        //felvágottak, húskészítmények
        Allergen::create(['alapanyag' => 'tepertő', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'libatepertő', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'hamburgerhús', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'löncshús', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'májgombóc', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'melegszendvicskrém', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'májas hurka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'véres hurka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'konzerv vagdalthús', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'disznósajt', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'tatárbifsztek', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'kolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'chorizo', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'csípős kolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'gyulai kolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'paprikás szalámi', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'lecsókolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'szalámi', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'főzőkolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'debreceni kolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'paprikás kolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'kolbászhús', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'parasztkolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'sonkás szalámi', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'sütnivaló kolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'téliszalámi', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'lángolt kolbász', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'kenőmájas', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'májkrém', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'libamájpástétom', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'prosciutto', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'serrano sonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'sonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'felvágott', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'csirkemellsonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'gépsonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'pármai sonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'mangalicasonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'pulykamellsonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'feketeerdő sonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'kötözött sonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'prágai sonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'selyemsonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'főtt sonka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'füstölt-főtt tarja', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'füstölt lapocka', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'pastrami', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'bacon', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'pancetta', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'füstölt szalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'mangalica szalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'erdélyi szalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'kenyérszalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'kanadai bacon', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'kolozsvári szalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'angolszalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'császárszalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'tokaszalonna', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'mortadella', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'virsli', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'krinolin', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'párizsi', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'juhbeles virsli', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'frankfurti virsli', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'füstölt virsli', 'allergen' => 'animal']);
        Allergen::create(['alapanyag' => 'sertés virsli', 'allergen' => 'animal']);
        //felvágottak, húskészítmények vége
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
