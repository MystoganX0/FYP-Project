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
        $bookings = Booking::with(['student', 'schedule.phase', 'attempt'])
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

        $booking = Booking::with('schedule')->findOrFail($booking_id);

        // Update Booking Logistics Status
        $booking->update([
            'booking_status' => $request->booking_status
        ]);

        $message = 'Booking status updated successfully.';

        // Debug logging
        \Log::info('Booking Update - Booking ID: ' . $booking_id);
        \Log::info('Has attempt: ' . ($booking->attempt ? 'Yes' : 'No'));

        // Update Academic Result if attempt exists
        if ($booking->attempt) {
            $booking->attempt->update([
                'result' => $request->result ?? $booking->attempt->result
            ]);

            \Log::info('Attempt updated. Result: ' . ($request->result ?? $booking->attempt->result));
            \Log::info('Has schedule: ' . ($booking->schedule ? 'Yes' : 'No'));
            \Log::info('Phase ID: ' . ($booking->schedule ? $booking->schedule->phase_id : 'N/A'));
            \Log::info('Request result: ' . ($request->result ?? 'null'));

            // Handle JPJ Test (phase_id = 3) result changes
            if ($booking->schedule && $booking->schedule->phase_id == 3) {
                $application = \App\Models\Application::where('student_id', $booking->student_id)->first();

                if ($application) {
                    // If JPJ Test is passed, update application status to Completed
                    if ($request->result == 'Pass') {
                        \Log::info('JPJ Test passed! Updating application status to Completed...');
                        $application->update(['app_status' => 'Completed']);
                        $message = 'Booking status updated successfully. Application status set to Completed!';
                        \Log::info('Application status updated to Completed for student_id: ' . $booking->student_id);
                    }
                    // If JPJ Test is Pending or Failed, reset to In-Progress and reset congratulations flag
                    elseif (in_array($request->result, ['Pending', 'Failed'])) {
                        \Log::info('JPJ Test set to ' . $request->result . '. Resetting to In-Progress...');
                        $application->update([
                            'app_status' => 'In-Progress',
                            'congratulations_shown' => false
                        ]);
                        $message = 'Booking status updated successfully. Application status set to In-Progress.';
                        \Log::info('Application status reset to In-Progress for student_id: ' . $booking->student_id);
                    }
                } else {
                    \Log::warning('No application found for student_id: ' . $booking->student_id);
                }
            } else {
                \Log::info('Not a JPJ test or schedule not found');
            }
        }

        return back()->with('success', $message);
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
