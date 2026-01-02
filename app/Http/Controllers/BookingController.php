<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function computer()
    {
        $studentId = \Illuminate\Support\Facades\Auth::id();
        $application = \App\Models\Application::with(['class', 'payment.details'])->where('student_id', $studentId)->latest()->first();

        if (!$application) {
            return view('errors.no-application');
        }

        // Get Stage 2 Payment Detail
        $stage2Payment = null;
        if ($application && $application->payment) {
            $stage2Payment = $application->payment->details->where('stage', 'Stage 2')->first();
        }

        $schedules = \App\Models\Schedule::with('phase')->where('phase_id', 1)->orderBy('date')->get();

        // Generate next 12 months for filter
        $availableMonths = [];
        for ($i = 0; $i < 12; $i++) {
            $month = \Carbon\Carbon::now()->addMonths($i)->format('F Y');
            if ($month !== 'December 2025') {
                $availableMonths[] = $month;
            }
        }

        $bookings = \App\Models\Booking::with('schedule')
            ->where('app_id', $application->app_id)
            ->whereHas('schedule', function ($q) {
                $q->where('phase_id', 1);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $bookedScheduleIds = $bookings->pluck('schedule_id')->toArray();

        $hasActiveBooking = $bookings->contains(function ($booking) {
            // Active if status is Pending/Confirmed OR if they have Passed the test
            $isPassed = $booking->attempt && $booking->attempt->result === 'Pass';
            return in_array($booking->booking_status, ['Pending', 'Confirmed']) || $isPassed;
        });

        // Check for Re-test Fee Eligibility (Business Rule: Basic Package + Failed Test)
        $paymentRequired = false;
        $pendingPaymentId = null;

        if ($application->package && $application->package->package_type === 'Basic') {
            // Check failed attempts based on ACADEMIC RESULT
            $failedAttempts = $bookings->filter(function ($booking) {
                return $booking->attempt && $booking->attempt->result === 'Failed';
            })->count();

            if ($failedAttempts > 0) {
                // If they have failed, they must check if they have a 'Computer Test Retest' payment
                // We assume there should be a payment record created or we prompt them to pay.
                // Logic based on JPJ example: Check if last "Computer Test Retest" payment is NOT 'completed'

                // OR: user must simply pay before booking again. 
                // We check if there is a PENDING retest payment or NO retest payment for the *current* attempt cycle?
                // Simplification for this task: If failed count > paid retest count, then need pay.
                // However, without a robust billing system, we can check if there is an *unpaid* 'Computer Test Retest' payment
                // OR if we need to create one.

                // Let's look for any 'Computer Test Retest' payment for this student
                $retestPayment = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                    $q->where('app_id', $application->app_id);
                })
                    ->where('stage', 'Computer Test Retest')
                    ->where('status', '!=', 'paid') // If it's not paid, we need to pay it
                    ->latest()
                    ->first();

                // If no pending retest payment exists, but they failed, we might need to assume they need to generate one?
                // For now, let's assume if they have FAILED, and NO Active Booking, they need to pay retest fee.
                // But we must distinguish between "already paid for retest" and "needs to pay".

                // Let's refine: Count Fails vs Count Paid Retests
                $paidRetests = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                    $q->where('app_id', $application->app_id);
                })
                    ->where('stage', 'Computer Test Retest')
                    ->where('status', 'paid')
                    ->count();

                if ($failedAttempts > $paidRetests) {
                    $paymentRequired = true;
                    // Check if a pending payment exists to link to
                    $pendingDetail = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                        $q->where('app_id', $application->app_id);
                    })
                        ->where('stage', 'Computer Test Retest')
                        ->where('status', 'pending')
                        ->latest()
                        ->first();

                    if ($pendingDetail) {
                        $pendingPaymentId = $pendingDetail->payment_id;
                    } else {
                        // Create a new Payment and PaymentDetail for the re-test
                        $payment = \App\Models\Payment::create([
                            'app_id' => $application->app_id,
                            'payment_type' => 'retest computer',
                            'total_amount' => 50.00,
                            'status' => 'pending'
                        ]);

                        $pendingDetail = \App\Models\PaymentDetail::create([
                            'payment_id' => $payment->payment_id,
                            'stage' => 'Computer Test Retest',
                            'amount' => 50.00,
                            'status' => 'pending'
                        ]);

                        $pendingPaymentId = $payment->payment_id;
                    }
                }
            }
        }

        return view('ui.user.computer', compact('application', 'schedules', 'availableMonths', 'bookings', 'bookedScheduleIds', 'hasActiveBooking', 'stage2Payment', 'paymentRequired', 'pendingPaymentId'));
    }

    public function practical()
    {
        $studentId = \Illuminate\Support\Facades\Auth::id();
        $application = \App\Models\Application::with(['class', 'payment.details'])->where('student_id', $studentId)->latest()->first();

        if (!$application) {
            return view('errors.no-application');
        }

        // Get Stage 3 Payment Detail
        $stage3Payment = null;
        if ($application && $application->payment) {
            $stage3Payment = $application->payment->details->where('stage', 'Stage 3')->first();
        }

        $schedules = \App\Models\Schedule::with('phase')->where('phase_id', 2)->orderBy('date')->get();

        // Generate next 12 months for filter
        $availableMonths = [];
        for ($i = 0; $i < 12; $i++) {
            $month = \Carbon\Carbon::now()->addMonths($i)->format('F Y');
            if ($month !== 'December 2025') {
                $availableMonths[] = $month;
            }
        }

        $bookings = \App\Models\Booking::with('schedule')
            ->where('app_id', $application->app_id)
            ->whereHas('schedule', function ($q) {
                $q->where('phase_id', 2);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $bookedScheduleIds = $bookings->pluck('schedule_id')->toArray();

        // Check if user has reached the limit of 5 practical slots
        $activeAndDoneCount = $bookings->whereIn('booking_status', ['Pending', 'Done'])->count();
        $hasActiveBooking = $activeAndDoneCount >= 5;

        return view('ui.user.practical', compact('application', 'schedules', 'availableMonths', 'bookings', 'bookedScheduleIds', 'hasActiveBooking', 'stage3Payment'));
    }

    public function jpj()
    {
        $studentId = \Illuminate\Support\Facades\Auth::id();
        $application = \App\Models\Application::with('class')->where('student_id', $studentId)->latest()->first();

        if (!$application) {
            return view('errors.no-application');
        }
        $schedules = \App\Models\Schedule::with('phase')->where('phase_id', 3)->orderBy('date')->get();

        // Generate next 12 months for filter
        $availableMonths = [];
        for ($i = 0; $i < 12; $i++) {
            $month = \Carbon\Carbon::now()->addMonths($i)->format('F Y');
            if ($month !== 'December 2025') {
                $availableMonths[] = $month;
            }
        }

        $bookings = \App\Models\Booking::with('schedule')
            ->where('app_id', $application->app_id)
            ->whereHas('schedule', function ($q) {
                $q->where('phase_id', 3);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $bookedScheduleIds = $bookings->pluck('schedule_id')->toArray();

        $hasActiveBooking = $bookings->contains(function ($booking) {
            // Active if status is Pending/Confirmed OR if they have Passed the test
            $isPassed = $booking->attempt && $booking->attempt->result === 'Pass';
            return in_array($booking->booking_status, ['Pending', 'Confirmed']) || $isPassed;
        });

        // Check for Re-test Fee Eligibility
        $paymentRequired = false;
        $pendingPaymentId = null;

        if ($application->package && $application->package->package_type === 'Basic') {
            // Check failed attempts based on ACADEMIC RESULT
            $failedAttempts = $bookings->filter(function ($booking) {
                return $booking->attempt && $booking->attempt->result === 'Failed';
            })->count();

            if ($failedAttempts > 0) {
                // Count how many re-tests have been paid for
                $paidRetests = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                    $q->where('app_id', $application->app_id);
                })
                    ->where('stage', 'JPJ Re-test Fee')
                    ->where('status', 'paid')
                    ->count();

                if ($failedAttempts > $paidRetests) {
                    $paymentRequired = true;

                    // Check if a pending payment exists to link to
                    $pendingDetail = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                        $q->where('app_id', $application->app_id);
                    })
                        ->where('stage', 'JPJ Re-test Fee')
                        ->where('status', 'pending')
                        ->latest()
                        ->first();

                    if ($pendingDetail) {
                        $pendingPaymentId = $pendingDetail->payment_id;
                    } else {
                        // Create a new Payment and PaymentDetail for the re-test
                        // Note: JPJ fee is 238.95
                        $payment = \App\Models\Payment::create([
                            'app_id' => $application->app_id,
                            'payment_type' => 'retest jpj',
                            'total_amount' => 238.95,
                            'status' => 'pending'
                        ]);

                        $pendingDetail = \App\Models\PaymentDetail::create([
                            'payment_id' => $payment->payment_id,
                            'stage' => 'JPJ Re-test Fee',
                            'amount' => 238.95,
                            'status' => 'pending'
                        ]);

                        $pendingPaymentId = $payment->payment_id;
                    }
                }
            }
        }

        return view('ui.user.jpj', compact('application', 'schedules', 'availableMonths', 'bookings', 'bookedScheduleIds', 'hasActiveBooking', 'paymentRequired', 'pendingPaymentId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,schedule_id',
        ]);

        $studentId = \Illuminate\Support\Facades\Auth::id();
        $application = \App\Models\Application::where('student_id', $studentId)->latest()->first();

        if (!$application) {
            return redirect()->back()->with('error', 'No active application found.');
        }

        $schedule = \App\Models\Schedule::find($request->schedule_id);

        if ($schedule->slot <= 0) {
            return redirect()->back()->with('error', 'No slots available for this schedule.');
        }

        $phaseId = $schedule->phase_id;

        // Check for existing active booking based on phase type using schedule relationship
        if ($phaseId === 2) { // Practical Slot
            $activeAndDoneCount = \App\Models\Booking::where('app_id', $application->app_id)
                ->whereHas('schedule', function ($q) use ($phaseId) {
                    $q->where('phase_id', $phaseId);
                })
                ->whereIn('booking_status', ['Pending', 'Done'])
                ->count();

            if ($activeAndDoneCount >= 5) {
                return redirect()->back()->with('error', 'You have reached the limit of 5 practical slots.');
            }
        } else {
            // Computer Test (1) or JPJ Test (3)
            $hasActiveBooking = \App\Models\Booking::where('app_id', $application->app_id)
                ->whereHas('schedule', function ($q) use ($phaseId) {
                    $q->where('phase_id', $phaseId);
                })
                ->whereIn('booking_status', ['Pending', 'Confirmed'])
                ->exists();

            if ($hasActiveBooking) {
                return redirect()->back()->with('error', 'You already have an active booking. You cannot book another slot unless your previous attempt failed.');
            }

            // Enforce Re-test Fee for Basic Package
            if ($phaseId === 3 && $application->package && $application->package->package_type === 'Basic') {
                $failedAttempts = \App\Models\Attempt::where('app_id', $application->app_id) // Query Attempt directly
                    ->where('phase_id', 3)
                    ->where('result', 'Failed')
                    ->count();

                if ($failedAttempts > 0) {
                    $retestFeeUnpaid = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                        $q->where('app_id', $application->app_id);
                    })->where('stage', 'JPJ Re-test Fee')
                        ->where('status', '!=', 'paid')
                        ->exists();

                    if ($retestFeeUnpaid) {
                        return redirect()->back()->with('error', 'You must pay the re-test fee of RM 238.95 before booking another slot.');
                    }
                }
            }
        }

        $previousAttempts = \App\Models\Attempt::where('app_id', $application->app_id)
            ->where('phase_id', $phaseId)
            ->count();

        $previousAttempts = \App\Models\Attempt::where('app_id', $application->app_id)
            ->where('phase_id', $phaseId)
            ->count();

        $attempt = \App\Models\Attempt::create([
            'app_id' => $application->app_id,
            'phase_id' => $phaseId,
            'attempt_no' => $previousAttempts + 1,
            'result' => 'Pending',
        ]);

        \App\Models\Booking::create([
            'app_id' => $application->app_id,
            'schedule_id' => $request->schedule_id,
            'booking_status' => 'Pending',
            'attempt_id' => $attempt->attempt_id,
        ]);

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
