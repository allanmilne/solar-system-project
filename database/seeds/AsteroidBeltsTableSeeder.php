<?php

use Illuminate\Database\Seeder;

class AsteroidBeltsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asteroid_belts')->insert([
            'inner_edge' => 2.2,
            'outer_edge' => 3.2,
            'mass' => 2.39e21
        ]);
    }
}
