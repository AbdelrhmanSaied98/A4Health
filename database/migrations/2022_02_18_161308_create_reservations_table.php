<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id');
            $table->time('patient_time');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doc_id');
            $table->unique(['appointment_id', 'patient_time','doc_id']);
            $table->foreign('appointment_id')->references('id')->on('appointments');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('doc_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
