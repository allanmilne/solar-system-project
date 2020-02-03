<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Star;
use Faker\Generator as Faker;

$factory->define(Star::class, function () {
    return [
        'solar_system_id' => factory(\App\SolarSystem::class),
        'name' => 'Sun',
        'radius' => 696340,
        'mass' => 1.989e0
    ];
});
