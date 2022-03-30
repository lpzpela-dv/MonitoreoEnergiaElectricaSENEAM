<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlarmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarmas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->string('alarma', 300);
            $table->float('VoltL1', 10, 4);
            $table->float('VoltL2', 10, 4);
            $table->float('VoltL3', 10, 4);
            $table->float('volDiesel', 10, 4);
            $table->dateTime('fechaAlarma');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alarmas');
    }
}
