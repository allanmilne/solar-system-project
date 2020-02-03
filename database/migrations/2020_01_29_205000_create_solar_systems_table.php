<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolarSystemsTable extends Migration
{

    public function up()
    {
        Schema::create('solar_systems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('planet_id');
            $table->unsignedBigInteger('star_id');
            $table->float('habitable_zone_inner_edge');
            $table->float('habitable_zone_outer_edge');
            $table->unsignedBigInteger('asteroid_belt_id');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('solar_systems');
    }
}
