<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update any existing NULL results to 'Pending'
        DB::table('attempts')
            ->whereNull('result')
            ->update(['result' => 'Pending']);

        // Optional: Change column definition to default to 'Pending' if we wanted to enforce it at DB level
        // But for now, data update is sufficient as user request "make current data... as pending"
        // and we will handle new creations in Controller.
        Schema::table('attempts', function (Blueprint $table) {
            $table->string('result')->default('Pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverting 'Pending' back to null is ambiguous as some might genuinely be 'Pending'.
        // We will just remove the default constraint.
        Schema::table('attempts', function (Blueprint $table) {
            $table->string('result')->nullable()->default(null)->change();
        });
    }
};
