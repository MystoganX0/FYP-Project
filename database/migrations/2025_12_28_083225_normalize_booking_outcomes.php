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
        // 1. Handle Failed Bookings
        // bookings.status -> Completed, attempts.result -> Failed
        $failedBookings = DB::table('bookings')->where('booking_status', 'Failed')->get();
        foreach ($failedBookings as $booking) {
            DB::table('bookings')
                ->where('booking_id', $booking->booking_id)
                ->update(['booking_status' => 'Completed']);

            if ($booking->attempt_id) {
                DB::table('attempts')
                    ->where('attempt_id', $booking->attempt_id)
                    ->update(['result' => 'Failed']);
            }
        }

        // 2. Handle Done Bookings (Computer/JPJ) -> Pass
        // bookings.status -> Completed, attempts.result -> Pass
        $doneTestBookings = DB::table('bookings')
            ->join('schedules', 'bookings.schedule_id', '=', 'schedules.schedule_id')
            ->where('bookings.booking_status', 'Done')
            ->whereIn('schedules.phase_id', [1, 3]) // Computer & JPJ
            ->select('bookings.*')
            ->get();

        foreach ($doneTestBookings as $booking) {
            DB::table('bookings')
                ->where('booking_id', $booking->booking_id)
                ->update(['booking_status' => 'Completed']);

            if ($booking->attempt_id) {
                DB::table('attempts')
                    ->where('attempt_id', $booking->attempt_id)
                    ->update(['result' => 'Pass']);
            }
        }

        // 3. Handle Done Bookings (Practical) -> Completed
        // bookings.status -> Completed, attempts.result -> Completed
        $donePracticalBookings = DB::table('bookings')
            ->join('schedules', 'bookings.schedule_id', '=', 'schedules.schedule_id')
            ->where('bookings.booking_status', 'Done')
            ->where('schedules.phase_id', 2) // Practical
            ->select('bookings.*')
            ->get();

        foreach ($donePracticalBookings as $booking) {
            DB::table('bookings')
                ->where('booking_id', $booking->booking_id)
                ->update(['booking_status' => 'Completed']);

            if ($booking->attempt_id) {
                DB::table('attempts')
                    ->where('attempt_id', $booking->attempt_id)
                    ->update(['result' => 'Completed']);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reversal is complex due to data loss (Completed -> Failed/Done distinction based on result)
        // We will attempt to revert based on attempt result.

        $bookings = DB::table('bookings')
            ->join('attempts', 'bookings.attempt_id', '=', 'attempts.attempt_id')
            ->select('bookings.booking_id', 'attempts.result', 'attempts.phase_id');

        foreach ($bookings->get() as $record) {
            if ($record->result === 'Failed') {
                DB::table('bookings')->where('booking_id', $record->booking_id)->update(['booking_status' => 'Failed']);
            } elseif ($record->result === 'Pass' || $record->result === 'Completed') {
                DB::table('bookings')->where('booking_id', $record->booking_id)->update(['booking_status' => 'Done']);
            }
        }
    }
};
