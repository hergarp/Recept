<?php

namespace App\Http\Controllers;

use App\Models\Alapanyag_mertekegyseg;
use App\Models\Alapanyag;
use App\Models\Mertekegyseg;
use Illuminate\Http\Request;

class Alapanyag_mertekegysegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matunits = Alapanyag_mertekegyseg::all();
        return response()->json($matunits);

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
        $matunit = new Alapanyag_mertekegyseg();
        $matunit->mertekegyseg = $request->mertekegyseg;
        $matunit->alapanyag = $request->alapanyag;
        $matunit->save();

        $materials = Alapanyag::all();
        $units = Mertekegyseg::all();
        $matunits = Alapanyag_mertekegyseg::all();
        return view('admin.materials', ['materials'=> $materials, 'units' => $units, 'matunits' => $matunits]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alapanyag_mertekegyseg  $alapanyag_mertekegyseg
     * @return \Illuminate\Http\Response
     */
    public function show(Alapanyag_mertekegyseg $alapanyag_mertekegyseg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alapanyag_mertekegyseg  $alapanyag_mertekegyseg
     * @return \Illuminate\Http\Response
     */
    public function edit(Alapanyag_mertekegyseg $alapanyag_mertekegyseg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alapanyag_mertekegyseg  $alapanyag_mertekegyseg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alapanyag_mertekegyseg $alapanyag_mertekegyseg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alapanyag_mertekegyseg  $alapanyag_mertekegyseg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alapanyag_mertekegyseg $alapanyag_mertekegyseg)
    {
        //
    }
}
