<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StorageProcedureSpGetDieselReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "CREATE PROCEDURE GetDieselReport (IN fechaI VARCHAR(255),IN fechaF VARCHAR(255),IN areaID INT) BEGIN SELECT energy_records.id,energy_records.regtime AS fecha,energy_records.volDiesel,CONCAT(TRUNCATE(((energy_records.volDiesel*100)/t2.maxDiesel),2),'%') AS pocentaje FROM energy_records LEFT JOIN areas AS t2 ON energy_records.area_id = t2.id WHERE regtime between fechaI and FechaF AND energy_records.area_id = areaID; END";
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $procedure = "DROP PROCEDURE IF EXISTS GetDieselReport";
        DB::unprepared($procedure);
    }
}
