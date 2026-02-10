<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share history notification count with header view
        \Illuminate\Support\Facades\View::composer(['ui.user.header', 'ui.user.history'], function ($view) {
            $historyNotificationCount = 0;

            if (\Illuminate\Support\Facades\Auth::check()) {
                $studentId = \Illuminate\Support\Facades\Auth::id();

                // 1. Check for Application
                $application = \App\Models\Application::where('student_id', $studentId)->first();
                if ($application) {
                    $historyNotificationCount++; // Application submitted

                    // 2. Check for Passed Computer Test
                    $computerTest = \App\Models\Booking::where('student_id', $studentId)
                        ->whereHas('schedule', function ($q) {
                            $q->where('phase_id', 1); // 1 = Computer Test
                        })
                        ->whereHas('attempt', function ($q) {
                            $q->where('result', 'Pass');
                        })
                        ->exists();

                    if ($computerTest) {
                        $historyNotificationCount++;
                    }

                    // 3. Check for Completed Practical Training (>= 5 sessions)
                    $practicalCount = \App\Models\Booking::where('student_id', $studentId)
                        ->whereHas('schedule', function ($q) {
                            $q->where('phase_id', 2); // 2 = Practical Slot
                        })
                        ->whereIn('booking_status', ['Done', 'Completed'])
                        ->count();

                    if ($practicalCount >= 5) {
                        $historyNotificationCount++;
                    }

                    // 4. Check for Passed JPJ Test
                    $jpjTest = \App\Models\Booking::where('student_id', $studentId)
                        ->whereHas('schedule', function ($q) {
                            $q->where('phase_id', 3); // 3 = JPJ Test
                        })
                        ->whereHas('attempt', function ($q) {
                            $q->where('result', 'Pass');
                        })
                        ->exists();

                    if ($jpjTest) {
                        $historyNotificationCount++;
                    }
                }

                // Determine Booking Route logic
                $bookingRoute = 'computer';

                // Check if Computer Test Passed
                $computerTestPassed = \App\Models\Booking::where('student_id', $studentId)
                    ->whereHas('schedule', function ($q) {
                        $q->where('phase_id', 1);
                    })
                    ->whereHas('attempt', function ($q) {
                        $q->where('result', 'Pass');
                    })
                    ->exists();

                if ($computerTestPassed) {
                    $bookingRoute = 'practical';

                    // CHECK STAGE 2 PAYMENT for Installment Users
                    // If they passed computer test but haven't paid Stage 2, force them back to 'computer' page (to pay)
                    if ($application && $application->payment && $application->payment->payment_type === 'installment') {
                        $stage2Paid = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                            $q->where('app_id', $application->app_id);
                        })
                            ->where('stage', 'Stage 2')
                            ->where('status', 'paid')
                            ->exists();

                        \Illuminate\Support\Facades\Log::info('Header Booking Logic Check', [
                            'student_id' => $studentId,
                            'payment_type' => $application->payment->payment_type,
                            'stage2Paid' => $stage2Paid,
                            'bookingRoute_before' => $bookingRoute
                        ]);

                        if (!$stage2Paid) {
                            $bookingRoute = 'computer';
                        }
                    } else {
                        \Illuminate\Support\Facades\Log::info('Header Booking Logic Check - Not Installment or No Payment', [
                            'student_id' => $studentId,
                            'has_payment' => ($application && $application->payment) ? 'yes' : 'no',
                            'payment_type' => ($application && $application->payment) ? $application->payment->payment_type : 'null'
                        ]);
                    }

                    if ($bookingRoute === 'practical') {
                        $practicalCount = \App\Models\Booking::where('student_id', $studentId)
                            ->whereHas('schedule', function ($q) {
                                $q->where('phase_id', 2);
                            })
                            ->whereIn('booking_status', ['Done', 'Completed'])
                            ->count();

                        if ($practicalCount >= 5) {
                            $bookingRoute = 'jpj';

                            // CHECK STAGE 3 PAYMENT for Installment Users
                            if ($application && $application->payment && $application->payment->payment_type === 'installment') {
                                $stage3Paid = \App\Models\PaymentDetail::whereHas('payment', function ($q) use ($application) {
                                    $q->where('app_id', $application->app_id);
                                })
                                    ->where('stage', 'Stage 3')
                                    ->where('status', 'paid')
                                    ->exists();

                                if (!$stage3Paid) {
                                    $bookingRoute = 'practical';
                                }
                            }
                        }
                    }
                }
            } else {
                $bookingRoute = 'computer'; // Default for guests or if no auth (though auth check wraps this)
            }

            $view->with('historyNotificationCount', $historyNotificationCount)
                ->with('bookingRoute', $bookingRoute ?? 'computer');
        });
    }
}
