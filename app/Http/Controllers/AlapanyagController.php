<?php

namespace App\Http\Controllers;

use App\Models\Alapanyag;
use App\Models\Mertekegyseg;
use App\Models\Alapanyag_mertekegyseg;
use Illuminate\Http\Request;

class AlapanyagController extends Controller
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
    public function store(Request $request)
    {
        $material = new Alapanyag();
        $material->megnevezes = $request->megnevezes;
        $material->save();

        $materials = Alapanyag::all();
        $units = Mertekegyseg::all();
        $matunits = Alapanyag_mertekegyseg::all();
        return view('admin.materials', ['materials'=> $materials, 'units' => $units, 'matunits' => $matunits]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alapanyag  $alapanyag
     * @return \Illuminate\Http\Response
     */
    public function show(Alapanyag $alapanyag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alapanyag  $alapanyag
     * @return \Illuminate\Http\Response
     */
    public function edit(Alapanyag $alapanyag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alapanyag  $alapanyag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alapanyag $alapanyag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alapanyag  $alapanyag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alapanyag $alapanyag)
    {
        //
    }
}
