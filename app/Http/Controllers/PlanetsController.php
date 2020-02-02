<?php

namespace App\Http\Controllers;

use App\Planet;
use Illuminate\Http\Request;

class PlanetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // foreach planet in planets DB table 
        // display each planet object as json
        


        return view('pages.planets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function discover()
    {
        // GET/planets/create
        return view('pages.planet_discover');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // POST /planets
        // persist the new planet
        $planet = new Planet;

        $planet->name = request('name');
        $planet->distance = request('distance');
        $planet->mass = request('mass');

        $planet->save();

        return redirect('planets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        // GET /planets/{id}
        $planet = Planet::find($name);
        
        return view('pages.planet', ['planet' => $planet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function edit(Planet $planet)
    {
        // GET /planets/{id}/edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planet $planet)
    {
        // PUT /planets/{id}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planet $planet)
    {
        // DELETE /planets/{id}
    }
}
