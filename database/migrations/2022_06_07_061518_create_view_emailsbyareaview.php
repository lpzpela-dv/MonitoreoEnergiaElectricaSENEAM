<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewEmailsbyareaview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $view = "
        CREATE VIEW `emailsbyareaview` AS SELECT t1.id,t1.aeropuerto_id,t3.type,t3.emails FROM areas AS t1 JOIN aeropuertos AS 
        t2 ON t1.aeropuerto_id=t2.id RIGHT JOIN notification_emails AS t3 ON t2.id=t3.aeropuerto_id ";
        DB::unprepared($view);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $view = "DROP TABLE IF EXISTS `emailsbyareaview`;";
        DB::unprepared($view);
    }
}
