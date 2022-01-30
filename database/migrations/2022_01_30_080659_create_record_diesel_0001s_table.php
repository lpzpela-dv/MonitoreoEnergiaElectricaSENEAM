<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordDiesel0001sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_diesel_0001s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planta_id');
            $table->foreign('planta_id')->references('id')->on('plantas');
            $table->integer('dieselValue');
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
        Schema::dropIfExists('record_diesel_0001s');
    }
}
