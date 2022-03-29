<?php

namespace App\Http\Controllers;

use App\Models\Receptkonyv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReceptkonyvController extends Controller
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
        //
    }

    public function saveRecipe(Request $request, $url_slug)
    {
        $rk=new Receptkonyv();
        $rk->user=Auth::user()->id; 
        $rk->recept=$request->recipe_id; 
        $rk->minosites=0;  // ezt kikell szedni adatbázis migráció után
        $rk->save();
        $adag=$request->recipe_adag;
        return redirect('/recipe/'.$url_slug.'?adag='.$adag.'#recipe-save');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receptkonyv  $receptkonyv
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $user=Auth::user()->id; 
        $receptkonyv=DB::table('receptkonyvs')->where ('receptkonyvs.user', '=',$user)
                                            -> join('recepts', 'receptkonyvs.recept', '=', 'recepts.r_id')
                                            -> select('receptkonyvs.jelzes', 'receptkonyvs.minosites','recepts.url_slug','recepts.megnevezes', 'recepts.kep')
                                            ->get();
        return view('profile', ['receptkonyv'=>$receptkonyv]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receptkonyv  $receptkonyv
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptkonyv $receptkonyv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receptkonyv  $receptkonyv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receptkonyv $receptkonyv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receptkonyv  $receptkonyv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptkonyv $receptkonyv)
    {
        //
    }
}
