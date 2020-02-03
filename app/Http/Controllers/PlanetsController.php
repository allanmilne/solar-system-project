<?php

namespace App\Http\Controllers;

use App\Planet;
use Illuminate\Http\Request;

class PlanetsController extends Controller
{

    public function index()
    {
        $planets = Planet::orderBy('distance', 'asc')->get();
        return view('planets.index')->with('planets', $planets);
    }

    public function discover()
    {
        return view('planets.discover');  
    }

    public function store()
    {
        Planet::create($this->validatePlanet());

        return redirect('planets');
    }

    public function show(Planet $planet)
    {
        return view('planets.show', ['planet' => $planet]);
    }

    public function edit(Planet $planet)
    {
        return view('planets.edit',['planet' => $planet]);
    }

    public function update(Planet $planet)
    {
        $planet->update($this->validatePlanet());

        return redirect('planets/' . $planet->id);
    }

    public function destroy(Planet $planet)
    {
        // DELETE /planets/{id}
    }

    private function validatePlanet()
    {
        return request()->validate([
            'name' => 'required',
            'distance' => 'required',
            'mass' => 'required'
        ]);
    }
}
