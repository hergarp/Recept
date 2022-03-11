<?php

namespace App\Http\Controllers;

use App\Models\Recept;
use App\Models\Konyha;
use App\Models\Kategoria;
use App\Models\Alapanyag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $recept->user = auth()->user()->u_id;
        if ($request->file('file') != null) {
            $file = $request->file('file');
            $path = $file->storePublicly('images');
            $recept->kep = $path;
        }
        $recept->kategoria = $request->kategoria;
        $recept->konyha = $request->konyha;
        $recept->adag = $request->adag;
        $recept->elokeszitesi_ido = $request->preparation;
        $recept->fozesi_ido = $request->cooking;
        $recept->sutesi_ido = $request->baking;
        $recept->fogas = $request->snacky;
        $recept->konyhatechnologia = $request->technology;
        $recept->babakonyha = $request->baby;
        $recept->egyeb_elnevezesek = $request->egyeb_elnevezesek;
        // $recept->receptkonyvben = $request->receptkonyvben;
        // $recept->ossznezettseg = $request->ossznezettseg;
        $recept->reggeli = $request->has(breakfast)?1:0;
        $recept->tizorai = $request->elevenses;
        $recept->ebed = $request->lunch;
        $recept->uzsonna = $request->snack;
        $recept->vacsora = $request->dinner;
        $recept->tavasz = $request->spring;
        $recept->nyar = $request->summer;
        $recept->osz = $request->autumn;
        $recept->tel = $request->winter;

        $recept->save();

        // auth()->user()->recepts()->attach($recept->id)

        $r_id = $recept->id;

        $alapanyagok = $request->alapanyagok;
        $mertekegysegek = $request->quantities;
        $units = $request->units;

        for ($i = 0; $i < $alapanyagok.length(); $i++) {
            $am = AlapanyagMertekegyseg::where('alapanyag', '=', $alapanyagok[i])
            ->where('mertekegyseg', '=', $mertekegysegek[i])->first();
            
            $a = new Alkotja();
            $a->recept = $r_id;
            $a->alapanyag_mertekegyseg = $am->am_id;
            $a->mennyiseg = $units[i];
            $a->save();
        }
        
        
        // $recept->alapanyagMertekegyseg()->attach([$am->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recept  $recept
     * @return \Illuminate\Http\Response
     */
    public function show(Recept $recept)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recept  $recept
     * @return \Illuminate\Http\Response
     */
    public function edit(Recept $recept)
    {
        //
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
    public function destroy(Recept $recept)
    {
        //
    }
}
