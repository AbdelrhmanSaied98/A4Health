<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doc_id');
            $table->enum('rate', [1,2,3,4,5]);
            $table->text('message');
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
        Schema::dropIfExists('feedbacks');
    }
}
