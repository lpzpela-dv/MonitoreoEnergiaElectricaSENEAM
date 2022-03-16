<?php

namespace Database\Seeders;

use App\Models\EnergyRecord;
use Illuminate\Database\Seeder;

class EnergyRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ],
            [
                'area_id' => 2,
                'VoltL1' =>  $this->getRandom(1190, 1240, 10),
                'VoltL2' =>  $this->getRandom(1190, 1240, 10),
                'VoltL3' =>  $this->getRandom(1190, 1240, 10),
                'VoltL4' =>  $this->getRandom(1190, 1240, 10),
                'VoltL5' =>  $this->getRandom(1190, 1240, 10),
                'VoltL6' =>  $this->getRandom(1190, 1240, 10),
                'VoltL7' =>  $this->getRandom(1190, 1240, 10),
                'VoltL8' =>  $this->getRandom(1190, 1240, 10),
                'VoltL9' =>  $this->getRandom(1190, 1240, 10),
                'AmpL1' => $this->getRandom(10, 20, 100),
                'AmpL2' => $this->getRandom(10, 20, 100),
                'AmpL3' => $this->getRandom(10, 20, 100),
                'AmpL4' => $this->getRandom(10, 20, 100),
                'AmpL5' => $this->getRandom(10, 20, 100),
                'AmpL6' => $this->getRandom(10, 20, 100),
                'AmpL7' => $this->getRandom(10, 20, 100),
                'AmpL8' => $this->getRandom(10, 20, 100),
                'AmpL9' => $this->getRandom(10, 20, 100),
                'WattsL1' => $this->getRandom(1110, 1220, 100000),
                'WattsL2' => $this->getRandom(1110, 1220, 100000),
                'WattsL3' => $this->getRandom(1110, 1220, 100000),
                'WattsL4' => $this->getRandom(1110, 1220, 100000),
                'WattsL5' => $this->getRandom(1110, 1220, 100000),
                'WattsL6' => $this->getRandom(1110, 1220, 100000),
                'WattsL7' => $this->getRandom(1110, 1220, 100000),
                'WattsL8' => $this->getRandom(1110, 1220, 100000),
                'WattsL9' => $this->getRandom(1110, 1220, 100000),
                'KwHL1' => $this->getRandom(1110, 1220, 100000),
                'KwHL2' => $this->getRandom(1110, 1220, 100000),
                'KwHL3' => $this->getRandom(1110, 1220, 100000),
                'KwHL4' => $this->getRandom(1110, 1220, 100000),
                'KwHL5' => $this->getRandom(1110, 1220, 100000),
                'KwHL6' => $this->getRandom(1110, 1220, 100000),
                'KwHL7' => $this->getRandom(1110, 1220, 100000),
                'KwHL8' => $this->getRandom(1110, 1220, 100000),
                'KwHL9' => $this->getRandom(1110, 1220, 100000),
                'FpL1' => $this->getRandom(50, 70, 10),
                'FpL2' => $this->getRandom(50, 70, 10),
                'FpL3' => $this->getRandom(50, 70, 10),
                'Fpl4' => $this->getRandom(50, 70, 10),
                'FpL5' => $this->getRandom(50, 70, 10),
                'FpL6' => $this->getRandom(50, 70, 10),
                'FpL7' => $this->getRandom(50, 70, 10),
                'FpL8' => $this->getRandom(50, 70, 10),
                'FpL9' => $this->getRandom(50, 70, 10),
                'HzL1' => $this->getRandom(5900, 6100, 100),
                'HzL2' => $this->getRandom(5900, 6100, 100),
                'HzL3' => $this->getRandom(5900, 6100, 100),
                'HzL4' => $this->getRandom(5900, 6100, 100),
                'HzL5' => $this->getRandom(5900, 6100, 100),
                'HzL6' => $this->getRandom(5900, 6100, 100),
                'HzL7' => $this->getRandom(5900, 6100, 100),
                'HzL8' => $this->getRandom(5900, 6100, 100),
                'HzL9' => $this->getRandom(5900, 6100, 100),
                'regtime' => '2022-03-15 01:26:00'

            ]
        ];
        EnergyRecord::insert($records);
    }

    public function getRandom($min, $max, $div)
    {
        $val = rand($min, $max) / $div;
        return $val;
    }
}
