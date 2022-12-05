<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNameInHelpCentresTable extends Migration
{
    public function up(): void
    {
        Schema::table('help_centres', function (Blueprint $table) {
            $table->renameColumn('imgae', 'image');
        });
    }

    public function down(): void
    {
        Schema::table('help_centres', function (Blueprint $table) {
            $table->renameColumn('image', 'imgae');
        });
    }
}
