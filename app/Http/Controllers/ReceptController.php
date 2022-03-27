<?php

namespace App\Http\Controllers;

use App\Models\Recept;
use App\Models\Konyha;
use App\Models\Kategoria;
use App\Models\Alapanyag;
use App\Models\Alapanyag_mertekegyseg;
use App\Models\Alkotja;
use App\Models\Lepes;
use App\Models\Uzenet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe = Recept::all()->where('statusz','publikus');
        return view('index', ['recipes'=> $recipe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konyhas = Konyha::all();
        $kategorias = Kategoria::all();
        $materials = Alapanyag::all();
        return view('upload', ['konyhas'=> $konyhas, 'kategorias' => $kategorias, 'materials' => $materials]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recept = new Recept();
        $recept->megnevezes = $request->title;
        $recept->url_slug = $request->url_slug;
        $recept->user = Auth::user()->id;
        if ($request->file('file') != null) {
            $file = $request->file('file');
            $path = $file->storePublicly('images');
            $recept->kep = $path;
        }
        $recept->kategoria = $request->category;
        $recept->konyha = $request->kitchen;
        $recept->adag = $request->adag;
        $recept->elokeszitesi_ido = $request->preparation;
        $recept->fozesi_ido = $request->cooking;
        $recept->sutesi_ido = $request->baking;
        $recept->fogas = $request->snacky;
        $recept->konyhatechnologia = $request->technology;
        $recept->babakonyha = $request->baby;
        if ($request->names != null) {
            $recept->egyeb_elnevezesek = $request->names;
            $recept->egyeb_elnevezesek = json_encode($names);
        }
        $recept->reggeli = $request->has('breakfast');
        $recept->tizorai = $request->has('elevenses');
        $recept->ebed = $request->has('lunch');
        $recept->uzsonna = $request->has('snack');
        $recept->vacsora = $request->has('dinner');
        $recept->tavasz = $request->has('spring');
        $recept->nyar = $request->has('summer');
        $recept->osz = $request->has('autumn');
        $recept->tel = $request->has('winter');
        

        $recept->save();

        $r_id = $recept->r_id;
        $adag = $recept->adag;

        $alme = array_map(null, $request->material, $request->quantity, $request->unit);
        foreach ($alme as $material) {
            $am = Alapanyag_mertekegyseg::where('alapanyag', '=', $material[0])
            ->where('mertekegyseg', '=', $material[2])->first();

            $a = new Alkotja();
            $a->recept = $r_id;
            $a->alapanyag_mertekegyseg = $am->am_id;
            $a->mennyiseg = $material[1]/$adag;
            $a->save();
        }

        $lepesek = $request->step;

        foreach ($lepesek as $lepes) {
            $l = new Lepes();
            $l->recept = $r_id;
            $l->lepes = $lepes;
            $l->save();
        }
        
        if ($request->message != null) {
            $message = new Uzenet();
            $message->recept = $r_id;
            $message->uzenet = $request->message;
        }

        return redirect('index');
    }

    public function draftList()
    {
        $recipes = Recept::all()->where('statusz', '!=', 'publikus');
        return view('admin.draft-recipe-list', ['recipes'=> $recipes]);
    }

    public function recipeList()
    {
        $recipes = Recept::all()->where('statusz', '=', 'publikus');
        return view('admin.recipe-list', ['recipes'=> $recipes]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recept  $recept
     * @return \Illuminate\Http\Response
     */
    public function show($url_slug)
    {
        $recipe = Recept::where('url_slug',$url_slug)->first();
        $id=$recipe->r_id;
        $alkotjas = DB::table('alkotjas')->where('recept', '=', $id)
                                         ->join('alapanyag_mertekegysegs', 
                                                'alkotjas.alapanyag_mertekegyseg', 
                                                '=', 
                                                'alapanyag_mertekegysegs.am_id')
                                         ->select('alapanyag_mertekegysegs.alapanyag',
                                                'alapanyag_mertekegysegs.mertekegyseg',
                                                'alkotjas.mennyiseg')
                                         ->get();
        $allergens = [];
        foreach ($alkotjas as $alkotja) {
            $allergen = DB::table('allergens')->where('alapanyag', '=', $alkotja->alapanyag)
                                              ->pluck('allergen');
            if ($allergen != null) {
                array_push($allergens, $allergen);
            }
        }
        $steps = Lepes::all()->where('recept', '=', $id);
        return view('recipe', ['recipe'=> $recipe, 'alkotjas'=>$alkotjas, 'steps'=>$steps, 'allergens'=>$allergens]);
    }

    public function seged(Request $request)
    {
        
        return response()->json(['recipes'=> $recipes_by_option]);
    }

    public function search(Request $request) 
    {
        $keyword = $request->keyword;
        $option = $request->search_selector;
        $raw_material = $request->raw_material;
        $no_material = $request->no_material;
        $recs = [];
        if ($option == "name") {
            $recipes_by_option = DB::table('recepts')->join('alkotjas', 
                                                            'recepts.r_id', 
                                                            '=', 
                                                            'alkotjas.recept')
                                                     ->join('alapanyag_mertekegysegs', 
                                                            'alkotjas.alapanyag_mertekegyseg', 
                                                            '=', 
                                                            'alapanyag_mertekegysegs.am_id')
                                                     ->where('megnevezes','like','%'.$keyword.'%')
                                                     ->where('statusz','publikus')
                                                     ->get();
            $seged = [];
            foreach ($recipes_by_option as $recipe) {
                array_push($seged, $recipe);
            }
            $recipes_by_option = $seged;
        }
        else {
            $rec_ids = DB::table('alkotjas')->join('alapanyag_mertekegysegs', 
                                                   'alkotjas.alapanyag_mertekegyseg', 
                                                   '=', 
                                                   'alapanyag_mertekegysegs.am_id')
                                            ->select('alkotjas.recept')
                                            ->where('alapanyag_mertekegysegs.alapanyag','like','%'.$keyword.'%')->get();
            $recipes_by_option=[];
            if (count($rec_ids) == 0) {$recipes_by_option=[];}
            else {
                foreach ($rec_ids as $id) {
                    $recipe = DB::table('recepts')->where('r_id', '=', $id->recept)
                                                    ->where('statusz','publikus')
                                                    ->first();
                                        
                    if ($recipe != null) {
                        array_push($recipes_by_option, $recipe);
                    }
                }
            }
        }
        
        $search_terms = array("winter"=>"tel", 
                              "spring" => "tavasz", 
                              "summer" => "nyar", 
                              "autumn" => "osz",
                              "breakfast" => "reggeli",
                              "elevenses" => "tizorai",
                              "lunch" => "ebed",
                              "snack" => "uzsonna",
                              "dinner" => "vacsora",);
        
        $request_num = count($request->all());
        if ($request_num > 4){
            foreach($search_terms as $key => $value) {
                if(isset($request->$key)) {
                    foreach ($recipes_by_option as $recipe){
                        if($recipe->$value == 1){
                            array_push($recs, $recipe);
                        }
                    }
                }
            }
        }
        else {
            $recs = $recipes_by_option;
        }

        //szűrés alapanyagra
        if ($raw_material != null) {
            $seged = [];
            foreach ($recs as $recipe) {
                $recipe = (array)$recipe;
                if ($recipe['alapanyag'] == $raw_material) {
                    array_push($seged,$recipe);
                }
            }
            $recs = $seged;
        }

        //szűrés alapanyag nélkülre
        // if ($no_material != null) {
        //     $seged = [];
        //     $seged2 = [];
        //     foreach ($recs as $recipe) {
        //         $recipe = (array)$recipe;
        //         if ($recipe['alapanyag'] == $no_material) {
        //             array_push($seged,$recipe);
        //         }
        //         else {
        //             array_push($seged2,$recipe);
        //         }
        //     }
        //     $recs = array_diff($seged, $seged2);
        // }
        $recipes = [];
        foreach ($recs as $rec) {
            $recipe =  [];
            $rec = (array)$rec;
            $recipe['url_slug'] = $rec['url_slug'];
            $recipe['megnevezes'] = $rec['megnevezes'];
            $recipe['kep'] = $rec['kep'];
            $recipe['adag'] = $rec['adag'];
            array_push($recipes, $recipe);
        }
        $recipes = array_unique($recipes,SORT_REGULAR);

        $materials = Alapanyag::all();
        return view('results', ['recipes'=> $recipes, 'keyword' => $keyword, 'option'=>$option, 'materials'=>$materials]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recept  $recept
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recept::where('r_id', $id)->first();
        $steps = Lepes::all()->where('recept', '=', $id);
        $alkotjas = DB::table('alkotjas')->where('recept', '=', $id)
                                         ->join('alapanyag_mertekegysegs', 
                                                'alkotjas.alapanyag_mertekegyseg', 
                                                '=', 
                                                'alapanyag_mertekegysegs.am_id')
                                         ->select('alkotjas.alk_id',
                                                  'alapanyag_mertekegysegs.alapanyag',
                                                  'alapanyag_mertekegysegs.mertekegyseg',
                                                  'alkotjas.mennyiseg')
                                         ->get();
        $message = Uzenet::where('recept', $id)->first();
        $materials = Alapanyag::all();
        $konyhas = Konyha::all();
        $kategorias = Kategoria::all();
        /*and if you want to get that from DB and convert it back to an array use:*/
        if (empty($recipe->egyeb_elnevezesek)) {
            $elnevezesek = [];
        }
        else {
            $elnevezesek = json_decode($recipe->egyeb_elnevezesek);
        }

        return view('admin.edit', ['recipe'=> $recipe, 
                                   'alkotjas' => $alkotjas, 
                                   'steps' => $steps, 
                                   'message' => $message,
                                   'materials' => $materials,
                                   'konyhas' => $konyhas,
                                   'kategorias' => $kategorias,
                                   'elnevezesek' => $elnevezesek]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recept  $recept
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'delete':
                Recept::where('r_id', $id)->delete();
                return redirect('admin/draft-recipe-list');
                break;
            default:
                $recept = Recept::find($id);
                $recept->megnevezes = $request->title;
                $recept->url_slug = $request->url_slug;
                $recept->kategoria = $request->category;
                $recept->konyha = $request->kitchen;
                $recept->adag = $request->adag;
                $recept->elokeszitesi_ido = $request->preparation;
                $recept->fozesi_ido = $request->cooking;
                $recept->sutesi_ido = $request->baking;
                $recept->fogas = $request->snacky;
                $recept->konyhatechnologia = $request->technology;
                $recept->babakonyha = $request->baby;
                $recept->egyeb_elnevezesek = $request->egyeb_elnevezesek;
                $recept->reggeli = $request->has('breakfast');
                $recept->tizorai = $request->has('elevenses');
                $recept->ebed = $request->has('lunch');
                $recept->uzsonna = $request->has('snack');
                $recept->vacsora = $request->has('dinner');
                $recept->tavasz = $request->has('spring');
                $recept->nyar = $request->has('summer');
                $recept->osz = $request->has('autumn');
                $recept->tel = $request->has('winter');
                $names = $request->name;
                $recept->egyeb_elnevezesek = json_encode($names);

                switch ($request->input('action')) {
                    case 'draft':
                        $recept->statusz = 'vázlat';
                        $recept->save();
                        break;
                        
                    case 'public':
                        $recept->statusz = 'publikus';
                        $recept->save();
                        break;
                    }

                Alkotja::where('recept', $id)->delete();
                Lepes::where('recept', $id)->delete();
                
                $alme = array_map(null, $request->material, $request->quantity, $request->unit);
                foreach ($alme as $material) {
                    $am = Alapanyag_mertekegyseg::where('alapanyag', '=', $material[0])
                    ->where('mertekegyseg', '=', $material[2])->first();
                    
                    $a = new Alkotja();
                    $a->recept = $id;
                    $a->alapanyag_mertekegyseg = $am->am_id;
                    $a->mennyiseg = $material[1];
                    $a->save();
                }
                
                $lepesek = $request->step;
                
                foreach ($lepesek as $lepes) {
                    $l = new Lepes();
                    $l->recept = $id;
                    $l->lepes = $lepes;
                    $l->save();
                }
                return redirect('index');
            }
            
            
    }
                    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recept  $recept
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recept::where('r_id', $id)->delete();
        
        return redirect('admin/draft-recipe-list');
    }
}
