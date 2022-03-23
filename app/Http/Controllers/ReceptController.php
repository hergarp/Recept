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

        $recept->save();

        $r_id = $recept->id;

        $alme = array_map(null, $request->material, $request->quantity, $request->unit);
        foreach ($alme as $material) {
            $am = Alapanyag_mertekegyseg::where('alapanyag', '=', $material[0])
            ->where('mertekegyseg', '=', $material[2])->first();

            $a = new Alkotja();
            $a->recept = $r_id;
            $a->alapanyag_mertekegyseg = $am->am_id;
            $a->mennyiseg = $material[1];
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

    public function draft()
    {
        $recipes = Recept::all()->where('statusz', '!=', 'publikus');
        return view('admin.draft-recipe-list', ['recipes'=> $recipes]);
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
        return view('recipe', ['recipe'=> $recipe, 'alkotjas'=>$alkotjas]);
    }

    public function seged($url_slug)
    {
        $recipe = DB::table('recepts')->where('r_id', '=', 1)->get();
        return response()->json(['recipe'=> $recipe]);
    }

    public function apiSearch(Request $request) 
    {
        $keyword = $request->keyword;
        $option = $request->search_selector;

        if ($option == "name") {
            $recs = DB::table('recepts')->where('megnevezes','like','%'.$keyword.'%')
                                        ->where('statusz','publikus')
                                        ->get();
            $recipes=[];
            if ($recs->isEmpty()){}
            else {
                foreach ($recs as $recipe) {
                    $materials = DB::table('alkotjas')->join('alapanyag_mertekegysegs', 
                                                             'alkotjas.alapanyag_mertekegyseg', 
                                                             '=', 
                                                             'alapanyag_mertekegysegs.am_id')
                                                       ->select('alapanyag_mertekegysegs.alapanyag')
                                                       ->where('alkotjas.recept',$recipe->megnevezes)
                                                       ->get();
                    $materials = json_decode($materials);
                    $recipe = (array)$recipe;
                    $recipe['hozzávalók'] = $materials;
                    array_push($recipes, $recipe);
                }
            }
        }
        else {
            $rec_ids = DB::table('alkotjas')->join('alapanyag_mertekegysegs', 
                                                   'alkotjas.alapanyag_mertekegyseg', 
                                                   '=', 
                                                   'alapanyag_mertekegysegs.am_id')
                                            ->select('alkotjas.recept')
                                            ->where('alapanyag_mertekegysegs.alapanyag','like','%'.$keyword.'%')->get();
            $recipes=[];
            foreach ($rec_ids as $id) {
                $recipe = DB::table('recepts')->where('r_id', '=', $id->recept)
                                              ->where('statusz','publikus')
                                              ->get();
                if ($recipe->isEmpty()) {}
                else {
                    $materials = DB::table('alkotjas')->join('alapanyag_mertekegysegs', 
                                                             'alkotjas.alapanyag_mertekegyseg', 
                                                             '=', 
                                                             'alapanyag_mertekegysegs.am_id')
                                                       ->select('alapanyag_mertekegysegs.alapanyag')
                                                       ->where('alkotjas.recept',$id->recept)
                                                       ->get();
                    $materials = json_decode($materials);
                    $recipe = json_decode($recipe);
                    $recipe['hozzávalók'] = $materials;
                    array_push($recipes, $recipe);
                }
            }
        }
        return response()->json(['recipes'=> $recipes]);
    }

    public function search(Request $request) 
    {
        $keyword = $request->keyword;
        $option = $request->search_selector;

        if ($option == "name") {
            $recs = DB::table('recepts')->where('megnevezes','like','%'.$keyword.'%')
                                           ->where('statusz','publikus')
                                           ->get();
            $recipes = [];
            if (count($recs) == 0) {$recipes=0;}
            else {
                foreach ($recs as $recipe) {
                    array_push($recipes,[$recipe]);
                }
            }
        }
        else {
            $rec_ids = DB::table('alkotjas')->join('alapanyag_mertekegysegs', 
                                                   'alkotjas.alapanyag_mertekegyseg', 
                                                   '=', 
                                                   'alapanyag_mertekegysegs.am_id')
                                            ->select('alkotjas.recept')
                                            ->where('alapanyag_mertekegysegs.alapanyag','like','%'.$keyword.'%')->get();
            $recipes=[];
            if (count($rec_ids) == 0) {$recipes=0;}
            else {
                foreach ($rec_ids as $id) {
                    $recipe = DB::table('recepts')->where('r_id', '=', $id->recept)
                                                  ->where('statusz','publikus')
                                                  ->get();
                    if (count($recipe) != 0) {
                        array_push($recipes, $recipe);
                    }
                }
            }
        }
        return view('results', ['recipes'=> $recipes, 'keyword' => $keyword]);
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
        $elnevezesek = json_decode($recipe->egyeb_elnevezesek);

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
    public function update(Request $request, Recept $recept)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recept  $recept
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recept::where('r_id', $id)->first()->delete();
        Alkotja::where('recept', $id)->delete();
        Uzenet::where('recept', $id)->first()->delete();
        Lepes::where('recept', $id)->delete();
        
        $recipes = Recept::all()->where('statusz', '!=', 'publikus');
        return view('admin.draft-recipe-list', ['recipes'=> $recipes]);
    }
}
