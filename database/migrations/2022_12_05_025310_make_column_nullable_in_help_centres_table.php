<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColumnNullableInHelpCentresTable extends Migration
{
    public function up(): void
    {
        Schema::table('help_centres', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('help_centres', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
        });
    }
}
