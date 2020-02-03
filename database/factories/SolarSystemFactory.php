<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SolarSystem;
use Faker\Generator as Faker;

$factory->define(SolarSystem::class, function () {
    return [
        // 'star' => 'Sun',
        'habitable_zone_inner_edge' => 0.95,
        'habitable_zone_outer_edge' => 2.4
    ];
});
