<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->unsignedBigInteger('specialty_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id');
            $table->date('scheduled_date');
            $table->time('scheduled_time');
            $table->string('type');
            $table->timestamps();
            
            $table->foreign('specialty_id')->references('id')->on('specialties');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
