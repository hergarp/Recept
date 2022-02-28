<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Alapanyag;
use App\Models\Mertekegyseg;
use App\Models\Alapanyag_mertekegyseg;
use Illuminate\Http\Request;

class AllergenController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * @param  \App\Models\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function show(Allergen $allergen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function edit(Allergen $allergen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allergen $allergen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allergen $allergen)
    {
        //
    }
}
