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
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreignId('phase_id')->nullable()->after('schedule_id')->constrained('phase', 'phase_id');
        });

        // Migrate data
        DB::table('schedules')->where('schedule_type', 'Computer Test')->update(['phase_id' => 1]);
        DB::table('schedules')->where('schedule_type', 'Practical Slot')->update(['phase_id' => 2]);
        DB::table('schedules')->where('schedule_type', 'JPJ Test')->update(['phase_id' => 3]);
        DB::table('schedules')->where('schedule_type', 'Jpj Test')->update(['phase_id' => 3]);

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('schedule_type');
            $table->foreignId('phase_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->string('schedule_type')->nullable();
        });

        // Reverse data migration
        DB::table('schedules')->where('phase_id', 1)->update(['schedule_type' => 'Computer Test']);
        DB::table('schedules')->where('phase_id', 2)->update(['schedule_type' => 'Practical Slot']);
        DB::table('schedules')->where('phase_id', 3)->update(['schedule_type' => 'JPJ Test']);

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['phase_id']);
            $table->dropColumn('phase_id');
            $table->string('schedule_type')->nullable(false)->change();
        });
    }
};
