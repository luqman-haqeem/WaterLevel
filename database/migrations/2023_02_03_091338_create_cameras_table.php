<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->string('JPS_camera_id');
            $table->string('camera_brand');
            $table->string('camera_name');
            $table->integer('district_id');
            $table->string('img_url')->nullable();
            $table->boolean('is_enabled')->default(0);
            $table->boolean('is_online')->default(0);
            $table->string('latitude');
            $table->string('longitude');
            $table->string('main_basin');
            $table->string('sub_basin')->nullable();
            $table->integer('station_id')->default(0);   
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
        Schema::dropIfExists('cameras');
    }
}
