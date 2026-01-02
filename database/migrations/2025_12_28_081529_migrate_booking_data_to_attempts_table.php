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
        $bookings = DB::table('bookings')
            ->join('schedules', 'bookings.schedule_id', '=', 'schedules.schedule_id')
            ->select('bookings.*', 'schedules.phase_id')
            ->get();

        foreach ($bookings as $booking) {
            // Create attempt record
            $attemptId = DB::table('attempts')->insertGetId([
                'app_id' => $booking->app_id,
                'phase_id' => $booking->phase_id,
                'attempt_no' => $booking->attempt_no,
                'result' => $booking->booking_status,
                'created_at' => $booking->created_at,
                'updated_at' => $booking->updated_at,
            ]);

            // Update booking with attempt_id
            DB::table('bookings')
                ->where('booking_id', $booking->booking_id)
                ->update(['attempt_id' => $attemptId]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Clear attempts data linked to bookings
        // Note: This is a destructive reverse, data won't move back to booking columns fully 
        // because we aren't re-adding columns here (assuming columns might be dropped later). 
        // If columns still exist, we could reverse it. 
        // For now, we will just nullify attempt_id and truncate attempts table.

        DB::table('bookings')->update(['attempt_id' => null]);
        DB::table('attempts')->truncate();
    }
};
