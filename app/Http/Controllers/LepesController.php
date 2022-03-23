<?php

namespace App\Http\Controllers;

use App\Models\Lepes;
use Illuminate\Http\Request;

class LepesController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lepes  $lepes
     * @return \Illuminate\Http\Response
     */
    public function show(Lepes $lepes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lepes  $lepes
     * @return \Illuminate\Http\Response
     */
    public function edit(Lepes $lepes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lepes  $lepes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lepes $lepes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lepes  $lepes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$r_id)
    {
        Lepes::where('l_id', $id)->delete();
        
        return redirect('admin/edit/'.$r_id);
    }
}
