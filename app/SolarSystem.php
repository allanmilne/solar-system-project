<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolarSystem extends Model
{
    public function planets()
    {
        return $this->hasMany('App\Planet');
    }
    
    public function asteroid_belts()
    {
        return $this->hasMany('App\AsteroidBelt');
    }

    public function stars()
    {
        return $this->hasOne('App\Star');
    }
}