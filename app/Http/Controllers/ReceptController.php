<?php

namespace App\Http\Controllers;

use App\Models\Recept;
use App\Models\Konyha;
use App\Models\Kategoria;
use App\Models\Alapanyag;
use Illuminate\Http\Request;

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
        $file = $request->file('file');
        $path = $file->storePublicly('images');

        $recept = new Recept();
        $recept->megnevezes = $request->megnevezes;
        $recept->user = auth()->user()->u_id;
        $recept->kep = $path;
        $recept->kategoria = $request->kategoria;
        $recept->konyha = $request->konyha;
        $recept->adag = $request->adag;
        $recept->elokeszitesi_ido = $request->elokeszitesi_ido;
        $recept->fozesi_ido = $request->fozesi_ido;
        $recept->sutesi_ido = $request->sutesi_ido;
        $recept->fogas = $request->fogas;
        $recept->konyhatechnologia = $request->konyhatechnologia;
        $recept->babakonyha = $request->babakonyha;
        $recept->egyeb_elnevezesek = $request->egyeb_elnevezesek;
        $recept->receptkonyvben = $request->receptkonyvben;
        $recept->ossznezettseg = $request->ossznezettseg;
        $recept->reggeli = $request->reggeli;
        $recept->tizorai = $request->tizorai;
        $recept->ebed = $request->ebed;
        $recept->uzsonna = $request->uzsonna;
        $recept->vacsora = $request->vacsora;
        $recept->tavasz = $request->tavasz;
        $recept->nyar = $request->nyar;
        $recept->osz = $request->osz;
        $recept->tel = $request->tel;
        $recept->save();

        $r_id = $recept->id;

        $alapanyagok = $request->alapanyagok;
        $mertekegysegek = $request->quantitys;
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
