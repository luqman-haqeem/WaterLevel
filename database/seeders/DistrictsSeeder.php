<?php

namespace Database\Seeders;

use App\Models\Districts;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $districts =  [
            [
                'name' => 'KUALA SELANGOR',
                'order_by' => 0,
                'total_camera' => 3
            ],

            [
                'name' => 'SABAK BERNAM',
                'order_by' => 2,
                'total_camera' => 0
            ],
            [
                'name' => 'HULU LANGAT',
                'order_by' => 4,
                'total_camera' => 10
            ],
            [
                'name' => 'SEPANG',
                'order_by' => 1,
                'total_camera' => 6
            ],
            [
                'name' => 'KUALA LANGAT',
                'order_by' => 5,
                'total_camera' => 2
            ],
            [
                'name' => 'KLANG',
                'order_by' => 6,
                'total_camera' => 16
            ],
            [
                'name' => 'PETALING',
                'order_by' => 7,
                'total_camera' => 13
            ],
            [
                'name' => 'GOMBAK',
                'order_by' => 9,
                'total_camera' => 8
            ],
            [
                'name' => 'HULU SELANGOR',
                'order_by' => 8,
                'total_camera' => 6
            ],

        ];

        $DBdistricts = Districts::all();
        $districts = collect($districts)->reject(function ($district) use ($DBdistricts) {
            return $DBdistricts->contains('name', $district['name']);
        })->toArray();

        Districts::insert($districts);
    }
}
