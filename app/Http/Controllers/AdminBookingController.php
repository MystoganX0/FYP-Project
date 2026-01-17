<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Attempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExamResultNotification;
use App\Mail\PracticalCompletionNotification;

class AdminBookingController extends Controller
{
    public function index()
    {
        // Fetch all bookings with related data
        $allBookings = Booking::with(['student', 'schedule.phase', 'attempt'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Categorize bookings
        $computerBookings = $allBookings->filter(function ($booking) {
            return $booking->schedule && $booking->schedule->phase_id == 1;
        });

        $practicalBookings = $allBookings->filter(function ($booking) {
            return $booking->schedule && $booking->schedule->phase_id == 2;
        });

        $jpjBookings = $allBookings->filter(function ($booking) {
            return $booking->schedule && $booking->schedule->phase_id == 3;
        });

        return view('ui.admin.bookings.index', compact('computerBookings', 'practicalBookings', 'jpjBookings'));
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

            // Re-evaluate Application Current Stage based on full progress (Deterministic)
            $application = \App\Models\Application::where('student_id', $booking->student_id)
                ->latest()
                ->first();

            if ($application) {
                $newStage = null;

                // Check 1: JPJ Test Passed? (Phase 3)
                $jpjPass = Booking::where('student_id', $booking->student_id)
                    ->whereHas('schedule', function ($q) {
                        $q->where('phase_id', 3);
                    })
                    // Check if *any* attempt for this student is a Pass relative to this phase
                    // Or simpler: check if THIS specific booking made it pass, or if a previous one did.
                    // Doing a global check for the student is safer for re-evaluation.
                    ->whereHas('attempt', function ($q) {
                        $q->where('result', 'Pass');
                    })
                    ->exists();

                if ($jpjPass) {
                    $newStage = 'License Acquired';
                } else {
                    // Check 2: Completed 5 Practical Sessions? (Phase 2)
                    $completedPracticals = Booking::where('student_id', $booking->student_id)
                        ->whereHas('schedule', function ($q) {
                            $q->where('phase_id', 2);
                        })
                        ->where('booking_status', 'Completed')
                        ->count();

                    if ($completedPracticals >= 5) {
                        $newStage = 'JPJ Test'; // User requested "JPJ Test" specifically
                    } else {
                        // Check 3: Passed Computer Theory? (Phase 1)
                        $theoryPass = Booking::where('student_id', $booking->student_id)
                            ->whereHas('schedule', function ($q) {
                                $q->where('phase_id', 1);
                            })
                            ->whereHas('attempt', function ($q) {
                                $q->where('result', 'Pass');
                            })
                            ->exists();

                        if ($theoryPass) {
                            $newStage = 'Practical Slot';
                        }
                    }
                }

                // Only update if changed (or force update to ensure sync)
                if ($newStage && $application->current_stage !== $newStage) {
                    $application->update(['current_stage' => $newStage]);
                    \Log::info("App ID {$application->app_id} stage updated to: $newStage");
                } elseif (!$newStage && $application->current_stage) {
                    // Optional: Clear stage if no criteria met? 
                    // Keeping previous behaviour of just not updating if no criteria met might be safer 
                    // unless we want to allow reverting to NULL. 
                    // Given the user wants "revert", we should probably allow downgrading 
                    // but downgrading usually hits one of the lower tiers.
                    // If they fail everything, maybe we shouldn't wipe it? 
                    // Let's assume hitting the lower tier (Practical Slot) is the "revert".
                }
            }

            // Handle JPJ Test (phase_id = 3) result changes
            if ($booking->schedule && $booking->schedule->phase_id == 3) {
                // Use the new result from request, or fallback to current database result
                $currentResult = $request->result ?? $booking->attempt->result;

                // Find the LATEST application for this student
                $application = \App\Models\Application::where('student_id', $booking->student_id)
                    ->latest()
                    ->first();

                if ($application) {
                    // If JPJ Test is passed, update application status to Completed
                    if ($currentResult == 'Pass') {
                        \Log::info('JPJ Test passed! Updating application status to Completed for App ID: ' . $application->app_id);
                        $application->update(['app_status' => 'Completed']);
                        $message = 'Booking status updated successfully. Application status set to Completed!';
                    }
                    // If JPJ Test is Pending or Failed, reset to In-Progress
                    elseif (in_array($currentResult, ['Pending', 'Failed'])) {
                        \Log::info('JPJ Test set to ' . $currentResult . '. Resetting to In-Progress for App ID: ' . $application->app_id);
                        $application->update([
                            'app_status' => 'In-Progress',
                            'congratulations_shown' => false
                        ]);
                        $message = 'Booking status updated successfully. Application status set to In-Progress.';
                    }
                } else {
                    \Log::warning('No application found for student_id: ' . $booking->student_id);
                }
            } else {
                \Log::info('Not a JPJ test or schedule not found');
            }

            // --- Send Practical Completion Email ---
            // Trigger if phase is Practical (2) and status is Completed
            if ($booking->schedule && $booking->schedule->phase_id == 2 && $request->booking_status == 'Completed') {
                $completedPracticals = Booking::where('student_id', $booking->student_id)
                    ->whereHas('schedule', function ($q) {
                        $q->where('phase_id', 2);
                    })
                    ->where('booking_status', 'Completed')
                    ->count();

                \Log::info("Practical completion check. Student {$booking->student_id} has {$completedPracticals} completed sessions.");

                if ($completedPracticals == 5) {
                    try {
                        Mail::to($booking->student->email)->send(
                            new PracticalCompletionNotification($booking->student)
                        );
                        \Log::info("Practical completion email sent to {$booking->student->email}");
                        $message .= ' Practical completion email sent.';
                    } catch (\Exception $e) {
                        \Log::error('Failed to send practical completion email: ' . $e->getMessage());
                        $message .= ' Email sending failed.';
                    }
                }
            }

            // --- Send Exam Result Notification Email ---
            // Trigger if result is updated to Pass/Failed and it's a Computer (1) or JPJ (3) test
            $newResult = $request->result;
            if ($newResult && in_array($newResult, ['Pass', 'Failed']) && $booking->schedule) {
                if (in_array($booking->schedule->phase_id, [1, 3])) {
                    try {
                        Mail::to($booking->student->email)->send(
                            new ExamResultNotification($booking->student, $booking->schedule->phase->phase_name, $newResult)
                        );
                        \Log::info("Exam result email sent to {$booking->student->email} for {$booking->schedule->phase->phase_name}");

                        $message .= ' Email notification sent to student.';
                        return back()->with('success', $message);
                    } catch (\Exception $e) {
                        \Log::error('Failed to send exam result email: ' . $e->getMessage());

                        $message .= ' However, email notification FAILED to send.';
                        return back()->with('warning', $message . ' Error: ' . $e->getMessage());
                    }
                }
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
