<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() 
    {
        $this->call(SolarSystemsTableSeeder::class);
        $this->call(PlanetsTableSeeder::class);
        $this->call(StarsTableSeeder::class);
    }
}
