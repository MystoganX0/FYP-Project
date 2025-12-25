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
        \Illuminate\Support\Facades\View::composer('header', function ($view) {
            $historyNotificationCount = 0;

            if (\Illuminate\Support\Facades\Auth::check()) {
                $studentId = \Illuminate\Support\Facades\Auth::id();

                // 1. Check for Application
                $application = \App\Models\Application::where('student_id', $studentId)->first();
                if ($application) {
                    $historyNotificationCount++; // Application submitted

                    // 2. Check for Passed Computer Test
                    $computerTest = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
                        $query->where('student_id', $studentId);
                    })
                        ->where('phase_type', 'Computer Test')
                        ->where('booking_status', 'Done')
                        ->exists();

                    if ($computerTest) {
                        $historyNotificationCount++;
                    }

                    // 3. Check for Completed Practical Training (>= 5 sessions)
                    $practicalCount = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
                        $query->where('student_id', $studentId);
                    })
                        ->where('phase_type', 'Practical Slot')
                        ->where('booking_status', 'Done')
                        ->count();

                    if ($practicalCount >= 5) {
                        $historyNotificationCount++;
                    }

                    // 4. Check for Passed JPJ Test
                    $jpjTest = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
                        $query->where('student_id', $studentId);
                    })
                        ->where('phase_type', 'Jpj Test')
                        ->where('booking_status', 'Done')
                        ->exists();

                    if ($jpjTest) {
                        $historyNotificationCount++;
                    }
                }

                // Determine Booking Route logic
                $bookingRoute = 'computer';

                // Check if Computer Test Passed
                $computerTestPassed = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
                    $query->where('student_id', $studentId);
                })
                    ->where('phase_type', 'Computer Test')
                    ->where('booking_status', 'Done')
                    ->exists();

                if ($computerTestPassed) {
                    $bookingRoute = 'practical';

                    // Check if Practical Completed (>= 5 slots)
                    $practicalCount = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
                        $query->where('student_id', $studentId);
                    })
                        ->where('phase_type', 'Practical Slot')
                        ->where('booking_status', 'Done')
                        ->count();

                    if ($practicalCount >= 5) {
                        $bookingRoute = 'jpj';
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
