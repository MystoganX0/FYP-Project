<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Attempt;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        // Fetch all bookings with related data
        $bookings = Booking::with(['application.student', 'schedule.phase', 'attempt'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ui.admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, $booking_id)
    {
        $request->validate([
            'booking_status' => 'required|in:Pending,Confirmed,Completed,Absent,Failed',
            'result' => 'nullable|in:Pending,Pass,Failed,Completed',
        ]);

        $booking = Booking::findOrFail($booking_id);

        // Update Booking Logistics Status
        $booking->update([
            'booking_status' => $request->booking_status
        ]);

        // Update Academic Result if attempt exists
        if ($booking->attempt) {
            $booking->attempt->update([
                'result' => $request->result ?? $booking->attempt->result
            ]);
        }

        return back()->with('success', 'Booking status updated successfully.');
    }

    public function destroy($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);

        // Delete associated attempt if exists
        if ($booking->attempt) {
            $booking->attempt->delete();
        }

        $booking->delete();

        return back()->with('success', 'Booking deleted successfully.');
    }
}
