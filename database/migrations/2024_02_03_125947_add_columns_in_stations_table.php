<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stations', function (Blueprint $table) {
            $table->integer('station_status')->after('danger_water_level')->nullable();
            $table->boolean('mode')->after('station_status')->nullable();
            $table->boolean('z1')->nullable();
            $table->boolean('z2')->nullable();
            $table->boolean('z3')->nullable();
            $table->float('battery_level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stations', function (Blueprint $table) {
            $table->dropColumn('station_status');
            $table->dropColumn('mode');
            $table->dropColumn('z1');
            $table->dropColumn('z2');
            $table->dropColumn('z3');
            $table->dropColumn('battery_level');
        });
    }
}
