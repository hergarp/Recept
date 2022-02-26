<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use App\Models\Alapanyag;
use App\Models\Mertekegyseg;
use App\Models\Alapanyag_mertekegyseg;
use App\Models\Allergen;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Alapanyag::all();
        $units = Mertekegyseg::all();
        $matunits = Alapanyag_mertekegyseg::all();
        return view('admin.materials', ['materials'=> $materials, 'units' => $units, 'matunits' => $matunits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMaterial(Request $request)
    {
        $material = new Alapanyag();
        $material->megnevezes = $request->megnevezes;
        $material->save();

        $materials = Alapanyag::all();
        $units = Mertekegyseg::all();
        $matunits = Alapanyag_mertekegyseg::all();
        return view('admin.materials', ['materials'=> $materials, 'units' => $units, 'matunits' => $matunits]);
    }

    public function storeMatUnit(Request $request)
    {
        $matunit = new Alapanyag_mertekegyseg();
        $matunit->mertekegyseg = $request->mertekegyseg;
        $matunit->alapanyag = $request->alapanyag;
        $matunit->save();

        $materials = Alapanyag::all();
        $units = Mertekegyseg::all();
        $matunits = Alapanyag_mertekegyseg::all();
        return view('admin.materials', ['materials'=> $materials, 'units' => $units, 'matunits' => $matunits]);
    }

    public function storeAllergen(Request $request)
    {
        $allergen = new Allergen();
        $allergen->alapanyag = $request->alapanyag;
        $allergen->allergen = $request->allergen;
        $allergen->save();

        $materials = Alapanyag::all();
        $units = Mertekegyseg::all();
        $matunits = Alapanyag_mertekegyseg::all();
        return view('admin.materials', ['materials'=> $materials, 'units' => $units, 'matunits' => $matunits]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materials  $materials
     * @return \Illuminate\Http\Response
     */
    public function show(Materials $materials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materials  $materials
     * @return \Illuminate\Http\Response
     */
    public function edit(Materials $materials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materials  $materials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materials $materials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materials  $materials
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materials $materials)
    {
        //
    }
}
