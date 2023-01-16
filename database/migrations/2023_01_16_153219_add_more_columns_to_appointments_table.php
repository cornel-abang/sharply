<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToAppointmentsTable extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->boolean('optout_sms')->nullable();
            $table->boolean('avoid_calling')->nullable();
            $table->string('covid_appt_type')->nullable();
            $table->boolean('covid_exposed')->nullable();
            $table->string('covid_vac_status')->nullable();
            $table->string('population_group')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('optout_sms');
            $table->dropColumn('avoid_calling');
            $table->dropColumn('covid_appt_type');
            $table->dropColumn('covid_exposed');
            $table->dropColumn('covid_vac_status');
            $table->dropColumn('population_group');
        });
    }
}
