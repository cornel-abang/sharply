<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->uuid('help_centre_id')->index();
            $table->string('type');
            $table->string('day');
            $table->string('time');
            $table->date('dob');
            $table->string('gender_at_birth');
            $table->string('gender_today');
            $table->string('appt_for');
            $table->string('name');
            $table->string('phone');
            $table->string('location');
            $table->timestamps();
            $table->foreign('help_centre_id')->references('id')->on('help_centres')->onDelete('cascade');
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