<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewAreasSt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $view = "
       CREATE VIEW `areas_st` AS select 
        areas.id,areas.aeropuerto_id,areas.areaName,areas.maxDiesel
        , (select VoltL1 from energy_records where energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL1
        , (select VoltL2 from energy_records where energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL2
        , (select VoltL3 from energy_records WHERE energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL3
        , (select VoltL4 from energy_records where energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL4
        , (select VoltL5 from energy_records where energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL5
        , (select VoltL6 from energy_records WHERE energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL6
        , (select VoltL7 from energy_records where energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL7
        , (select VoltL8 from energy_records where energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL8
        , (select VoltL9 from energy_records WHERE energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) VoltL9
        , (select volDiesel from energy_records WHERE energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) volDiesel
        , (select regtime from energy_records where energy_records.area_id = areas.id order by energy_records.regtime desc limit 1) regtime
        from 
        areas 
        group by areas.id ;";

        DB::unprepared($view);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $view = "DROP TABLE IF EXISTS `areas_st`;";
        DB::unprepared($view);
    }
}
