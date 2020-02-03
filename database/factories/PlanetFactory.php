<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Planet;
use Faker\Generator as Faker;

$factory->define(Planet::class, function () {
    return [
        'solar_system_id' => factory(\App\SolarSystem::class),
        'name' => 'Earth',
        'distance' => 1,
        'mass' => 5.98e24
    ];
});
