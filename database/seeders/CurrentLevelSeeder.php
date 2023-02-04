<?php

namespace Database\Seeders;

use App\Models\CurrentLevel;
use Illuminate\Database\Seeder;

class CurrentLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $currentLevels = [
            [
                'id' => 1,
                'station_id' => 1,
                'current_level' => 4.27,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 2,
                'station_id' => 2,
                'current_level' => '-1.45',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 3,
                'station_id' => 3,
                'current_level' => 4.55,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 4,
                'station_id' => 4,
                'current_level' => 0.49,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 5,
                'station_id' => 5,
                'current_level' => 2.44,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 6,
                'station_id' => 6,
                'current_level' => '-1.35',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 7,
                'station_id' => 7,
                'current_level' => '-1.10',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 8,
                'station_id' => 8,
                'current_level' => 0.54,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 9,
                'station_id' => 9,
                'current_level' => 0.00,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 10,
                'station_id' => 10,
                'current_level' => 40.35,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 11,
                'station_id' => 11,
                'current_level' => 131.43,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 12,
                'station_id' => 12,
                'current_level' => 70.98,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 13,
                'station_id' => 13,
                'current_level' => 48.11,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 14,
                'station_id' => 14,
                'current_level' => 22.23,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 15,
                'station_id' => 15,
                'current_level' => 20.48,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 16,
                'station_id' => 16,
                'current_level' => 26.00,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 17,
                'station_id' => 17,
                'current_level' => 34.20,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 18,
                'station_id' => 18,
                'current_level' => 18.37,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 19,
                'station_id' => 19,
                'current_level' => 13.87,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 20,
                'station_id' => 20,
                'current_level' => 37.05,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 21,
                'station_id' => 21,
                'current_level' => 53.54,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 22,
                'station_id' => 22,
                'current_level' => 88.37,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 23,
                'station_id' => 23,
                'current_level' => 61.79,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 24,
                'station_id' => 24,
                'current_level' => 31.22,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 25,
                'station_id' => 25,
                'current_level' => 35.38,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 26,
                'station_id' => 26,
                'current_level' => 30.58,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 27,
                'station_id' => 27,
                'current_level' => 32.21,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 28,
                'station_id' => 28,
                'current_level' => 3.53,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 29,
                'station_id' => 29,
                'current_level' => 3.73,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 30,
                'station_id' => 30,
                'current_level' => 6.92,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 31,
                'station_id' => 31,
                'current_level' => 7.65,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 32,
                'station_id' => 32,
                'current_level' => 10.88,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 33,
                'station_id' => 33,
                'current_level' => 9.14,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 34,
                'station_id' => 34,
                'current_level' => 9.45,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 35,
                'station_id' => 35,
                'current_level' => 1.62,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 36,
                'station_id' => 36,
                'current_level' => 0.63,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 37,
                'station_id' => 37,
                'current_level' => 1.05,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 38,
                'station_id' => 38,
                'current_level' => '-7.69',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 39,
                'station_id' => 39,
                'current_level' => 1.20,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 40,
                'station_id' => 40,
                'current_level' => 1.82,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 41,
                'station_id' => 41,
                'current_level' => '-0.61',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 42,
                'station_id' => 42,
                'current_level' => 2.75,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 43,
                'station_id' => 43,
                'current_level' => 0.00,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 44,
                'station_id' => 44,
                'current_level' => 0.00,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 45,
                'station_id' => 45,
                'current_level' => 1.78,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 46,
                'station_id' => 46,
                'current_level' => 3.41,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 47,
                'station_id' => 47,
                'current_level' => '-0.34',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 48,
                'station_id' => 48,
                'current_level' => 1.03,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 49,
                'station_id' => 49,
                'current_level' => '-1.30',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 50,
                'station_id' => 50,
                'current_level' => '-1.01',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 51,
                'station_id' => 51,
                'current_level' => 0.15,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 52,
                'station_id' => 52,
                'current_level' => 2.50,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 53,
                'station_id' => 53,
                'current_level' => 15.14,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 54,
                'station_id' => 54,
                'current_level' => 14.81,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 55,
                'station_id' => 55,
                'current_level' => 5.16,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 56,
                'station_id' => 56,
                'current_level' => 17.04,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 57,
                'station_id' => 57,
                'current_level' => 10.18,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 58,
                'station_id' => 58,
                'current_level' => 36.33,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 59,
                'station_id' => 59,
                'current_level' => 18.14,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 60,
                'station_id' => 60,
                'current_level' => 6.07,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 61,
                'station_id' => 61,
                'current_level' => 5.42,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 62,
                'station_id' => 62,
                'current_level' => 32.99,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 63,
                'station_id' => 63,
                'current_level' => 15.99,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 64,
                'station_id' => 64,
                'current_level' => 21.32,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 65,
                'station_id' => 65,
                'current_level' => '-9999.00',
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 66,
                'station_id' => 66,
                'current_level' => 25.55,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 67,
                'station_id' => 67,
                'current_level' => 17.95,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 68,
                'station_id' => 68,
                'current_level' => 49.06,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 69,
                'station_id' => 69,
                'current_level' => 59.56,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 70,
                'station_id' => 70,
                'current_level' => 0.00,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 71,
                'station_id' => 71,
                'current_level' => 32.54,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 72,
                'station_id' => 72,
                'current_level' => 32.25,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 73,
                'station_id' => 73,
                'current_level' => 50.22,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 74,
                'station_id' => 74,
                'current_level' => 0.00,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 75,
                'station_id' => 75,
                'current_level' => 0.00,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 76,
                'station_id' => 76,
                'current_level' => 36.48,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 77,
                'station_id' => 77,
                'current_level' => 21.30,
                'alert_level' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 78,
                'station_id' => 78,
                'current_level' => 14.22,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 79,
                'station_id' => 79,
                'current_level' => 24.66,
                'alert_level' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]

        ];

        $DBCurrentLevels = CurrentLevel::all();
        $currentLevels = collect($currentLevels)->reject(function ($currentLevel) use ($DBCurrentLevels){
            return $DBCurrentLevels->contains('id',$currentLevel['id']);
        })->toArray();

        CurrentLevel::insert($currentLevels);

    }
}
