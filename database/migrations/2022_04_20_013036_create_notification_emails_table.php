<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_emails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aeropuerto_id');
            $table->foreign('aeropuerto_id')->references('id')->on('aeropuertos')->onDelete('cascade');
            $table->integer('type');
            $table->string('emails', 800);
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
        Schema::dropIfExists('notification_emails');
    }
}
