<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordEnergyCfe0001sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_energy_cfe_0001s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->integer('fuente');
            $table->float('VoltL1', 6, 2);
            $table->float('VoltL2', 6, 2);
            $table->float('VoltL3', 6, 2);
            $table->float('AmpL1', 6, 2);
            $table->float('AmpL2', 6, 2);
            $table->float('AmpL3', 6, 2);
            $table->float('WattsL1', 6, 2);
            $table->float('WattsL2', 6, 2);
            $table->float('WattsL3', 6, 2);
            $table->float('KwHL1', 6, 2);
            $table->float('KwHL2', 6, 2);
            $table->float('KwHL3', 6, 2);
            $table->float('FpL1', 6, 2);
            $table->float('FpL2', 6, 2);
            $table->float('FpL3', 6, 2);
            $table->float('HzL1', 6, 2);
            $table->float('HzL2', 6, 2);
            $table->float('HzL3', 6, 2);
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
        Schema::dropIfExists('record_energy_cfe_0001s');
    }
}
