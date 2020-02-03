<?php

use Illuminate\Database\Seeder;

class SolarSystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\SolarSystem::class)->create();
    }
}
