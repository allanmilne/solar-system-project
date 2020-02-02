<?php

namespace App\Http\Controllers;

use App\SolarSystem;
use Illuminate\Http\Request;

class SolarSystemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solarsystem');
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
     * @param  \App\SolarSystem  $solarSystem
     * @return \Illuminate\Http\Response
     */
    public function show(SolarSystem $solarSystem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SolarSystem  $solarSystem
     * @return \Illuminate\Http\Response
     */
    public function edit(SolarSystem $solarSystem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SolarSystem  $solarSystem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolarSystem $solarSystem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SolarSystem  $solarSystem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolarSystem $solarSystem)
    {
        //
    }
}
