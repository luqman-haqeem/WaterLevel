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
            $table->integer('JPS_sel_id');
            $table->string('public_info_id');
            $table->string('district_id');
            $table->string('station_name');
            $table->string('station_code');
            $table->string('ref_name');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('gsmNumber');
            $table->double('normal_water_level',8,2);
            $table->double('alert_water_level',8,2);
            $table->double('warning_water_level',8,2);
            $table->double('danger_water_level',8,2);


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
        Schema::dropIfExists('stations');
    }
}
