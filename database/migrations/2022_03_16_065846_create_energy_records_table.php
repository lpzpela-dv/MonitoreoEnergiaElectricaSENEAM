<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnergyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade');;
            $table->float('VoltL1', 10, 4);
            $table->float('VoltL2', 10, 4);
            $table->float('VoltL3', 10, 4);
            $table->float('VoltL4', 10, 4);
            $table->float('VoltL5', 10, 4);
            $table->float('VoltL6', 10, 4);
            $table->float('VoltL7', 10, 4);
            $table->float('VoltL8', 10, 4);
            $table->float('VoltL9', 10, 4);
            $table->float('AmpL1', 10, 4);
            $table->float('AmpL2', 10, 4);
            $table->float('AmpL3', 10, 4);
            $table->float('AmpL4', 10, 4);
            $table->float('AmpL5', 10, 4);
            $table->float('AmpL6', 10, 4);
            $table->float('AmpL7', 10, 4);
            $table->float('AmpL8', 10, 4);
            $table->float('AmpL9', 10, 4);
            $table->float('WattsL1', 10, 4);
            $table->float('WattsL2', 10, 4);
            $table->float('WattsL3', 10, 4);
            $table->float('WattsL4', 10, 4);
            $table->float('WattsL5', 10, 4);
            $table->float('WattsL6', 10, 4);
            $table->float('WattsL7', 10, 4);
            $table->float('WattsL8', 10, 4);
            $table->float('WattsL9', 10, 4);
            $table->float('KwHL1', 10, 4);
            $table->float('KwHL2', 10, 4);
            $table->float('KwHL3', 10, 4);
            $table->float('KwHL4', 10, 4);
            $table->float('KwHL5', 10, 4);
            $table->float('KwHL6', 10, 4);
            $table->float('KwHL7', 10, 4);
            $table->float('KwHL8', 10, 4);
            $table->float('KwHL9', 10, 4);
            $table->float('FpL1', 10, 4);
            $table->float('FpL2', 10, 4);
            $table->float('FpL3', 10, 4);
            $table->float('FpL4', 10, 4);
            $table->float('FpL5', 10, 4);
            $table->float('FpL6', 10, 4);
            $table->float('FpL7', 10, 4);
            $table->float('FpL8', 10, 4);
            $table->float('FpL9', 10, 4);
            $table->float('HzL1', 10, 4);
            $table->float('HzL2', 10, 4);
            $table->float('HzL3', 10, 4);
            $table->float('HzL4', 10, 4);
            $table->float('HzL5', 10, 4);
            $table->float('HzL6', 10, 4);
            $table->float('HzL7', 10, 4);
            $table->float('HzL8', 10, 4);
            $table->float('HzL9', 10, 4);
            $table->float('volDiesel', 10, 3);
            $table->integer('stCFE');
            $table->integer('stPlanta');
            $table->dateTime('regtime');
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
        Schema::dropIfExists('energy_records');
    }
}
