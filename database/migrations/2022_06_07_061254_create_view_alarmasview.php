<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewAlarmasview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $view = "
        CREATE VIEW `alarmasview` AS SELECT alarmas.id,t1.areaName,alarmas.alarma,alarmas.fechaAlarma 
        FROM alarmas LEFT JOIN areas t1 ON alarmas.area_id = t1.id ORDER BY alarmas.id DESC LIMIT 7 ";
        DB::unprepared($view);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $view = "DROP TABLE IF EXISTS `alarmasview`;";
        DB::unprepared($view);
    }
}
