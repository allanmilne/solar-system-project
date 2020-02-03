<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsteroidBeltsTable extends Migration
{
    public function up()
    {
        Schema::create('asteroid_belts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('solar_system_id'); // foreign key
            $table->float('inner_edge');
            $table->float('outer_edge');
            $table->float('mass');
            $table->timestamps();

        $table->foreign('solar_system_id')
            ->references('id')
            ->on('solar_systems')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asteroid_belts');
    }
}
