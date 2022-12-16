<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('external_station_id');
            $table->string('station_name');
            $table->string('district');
            $table->string('main_basin');
            $table->string('subriver_basin');
            $table->double('normal_water_level',);
            $table->double('alert_water_level',);
            $table->double('warning_water_level',);
            $table->double('danger_water_level',);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station');
    }
}
