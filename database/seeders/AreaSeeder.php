<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'aeropuerto_id' => 1,
                'areaName' => 'CCAR1',
                'maxDiesel' => 1500
            ],
            [
                'aeropuerto_id' => 1,
                'areaName' => 'CCAR2',
                'maxDiesel' => 1500
            ],
            [
                'aeropuerto_id' => 1,
                'areaName' => 'VOR',
                'maxDiesel' => 1500
            ],
            [
                'aeropuerto_id' => 1,
                'areaName' => 'RADAR',
                'maxDiesel' => 1500
            ],
            [
                'aeropuerto_id' => 1,
                'areaName' => 'TERRENA',
                'maxDiesel' => 1500
            ],
        ];

        Area::insert($areas);
    }
}
