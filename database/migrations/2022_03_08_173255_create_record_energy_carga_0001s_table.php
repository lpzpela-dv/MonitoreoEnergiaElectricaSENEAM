<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordEnergyCarga0001sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_energy_carga_0001s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->float('VoltL1', 4, 2);
            $table->float('VoltL2', 4, 2);
            $table->float('VoltL3', 4, 2);
            $table->float('AmpL1', 4, 2);
            $table->float('AmpL2', 4, 2);
            $table->float('AmpL3', 4, 2);
            $table->float('WattsL1', 4, 2);
            $table->float('WattsL2', 4, 2);
            $table->float('WattsL3', 4, 2);
            $table->float('KwHL1', 4, 2);
            $table->float('KwHL2', 4, 2);
            $table->float('KwHL3', 4, 2);
            $table->float('FpL1', 4, 2);
            $table->float('FpL2', 4, 2);
            $table->float('FpL3', 4, 2);
            $table->float('HzL1', 4, 2);
            $table->float('HzL2', 4, 2);
            $table->float('HzL3', 4, 2);
            $table->dateTime('time');
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
        Schema::dropIfExists('record_energy_carga_0001s');
    }
}
