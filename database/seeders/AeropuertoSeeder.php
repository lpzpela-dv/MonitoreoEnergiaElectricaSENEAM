<?php

namespace Database\Seeders;

use App\Models\Aeropuerto;
use Illuminate\Database\Seeder;

class AeropuertoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aeropuertos = [
            [
                'shortName' => 'SJDC',
                'description' => 'San Jose del Cabo'
            ]
        ];

        Aeropuerto::insert($aeropuertos);
    }
}
