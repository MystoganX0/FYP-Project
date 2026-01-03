<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('application', function (Blueprint $table) {
            $table->boolean('congratulations_shown')->default(false)->after('app_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application', function (Blueprint $table) {
            $table->dropColumn('congratulations_shown');
        });
    }
};
