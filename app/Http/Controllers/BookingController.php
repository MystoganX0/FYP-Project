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

        $schedules = \App\Models\Schedule::where('schedule_type', 'Computer Test')->orderBy('date')->get();

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
            ->where('phase_type', 'Computer Test')
            ->orderBy('created_at', 'desc')
            ->get();

        $bookedScheduleIds = $bookings->pluck('schedule_id')->toArray();

        $hasActiveBooking = $bookings->contains(function ($booking) {
            return $booking->booking_status !== 'Failed';
        });

        return view('computer', compact('application', 'schedules', 'availableMonths', 'bookings', 'bookedScheduleIds', 'hasActiveBooking', 'stage2Payment'));
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

        $schedules = \App\Models\Schedule::where('schedule_type', 'Practical Slot')->orderBy('date')->get();

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
            ->where('phase_type', 'Practical Slot')
            ->orderBy('created_at', 'desc')
            ->get();

        $bookedScheduleIds = $bookings->pluck('schedule_id')->toArray();

        // Check if user has reached the limit of 5 practical slots
        $activeAndDoneCount = $bookings->whereIn('booking_status', ['Pending', 'Done'])->count();
        $hasActiveBooking = $activeAndDoneCount >= 5;

        return view('practical', compact('application', 'schedules', 'availableMonths', 'bookings', 'bookedScheduleIds', 'hasActiveBooking', 'stage3Payment'));
    }

    public function jpj()
    {
        $studentId = \Illuminate\Support\Facades\Auth::id();
        $application = \App\Models\Application::with('class')->where('student_id', $studentId)->latest()->first();

        if (!$application) {
            return view('errors.no-application');
        }
        $schedules = \App\Models\Schedule::where('schedule_type', 'Jpj Test')->orderBy('date')->get();

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
            ->where('phase_type', 'Jpj Test')
            ->orderBy('created_at', 'desc')
            ->get();

        $bookedScheduleIds = $bookings->pluck('schedule_id')->toArray();

        $hasActiveBooking = $bookings->contains(function ($booking) {
            return $booking->booking_status !== 'Failed';
        });

        return view('jpj', compact('application', 'schedules', 'availableMonths', 'bookings', 'bookedScheduleIds', 'hasActiveBooking'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,schedule_id',
            'phase_type' => 'required|string',
        ]);

        $studentId = \Illuminate\Support\Facades\Auth::id();
        $application = \App\Models\Application::where('student_id', $studentId)->latest()->first();

        if (!$application) {
            return redirect()->back()->with('error', 'No active application found.');
        }

        // Check for existing active booking based on phase type
        if ($request->phase_type === 'Practical Slot') {
            $activeAndDoneCount = \App\Models\Booking::where('app_id', $application->app_id)
                ->where('phase_type', $request->phase_type)
                ->whereIn('booking_status', ['Pending', 'Done'])
                ->count();

            if ($activeAndDoneCount >= 5) {
                return redirect()->back()->with('error', 'You have reached the limit of 5 practical slots.');
            }
        } else {
            $hasActiveBooking = \App\Models\Booking::where('app_id', $application->app_id)
                ->where('phase_type', $request->phase_type)
                ->where('booking_status', '!=', 'Failed')
                ->exists();

            if ($hasActiveBooking) {
                return redirect()->back()->with('error', 'You already have an active booking. You cannot book another slot unless your previous attempt failed.');
            }
        }

        $schedule = \App\Models\Schedule::find($request->schedule_id);

        if ($schedule->slot <= 0) {
            return redirect()->back()->with('error', 'No slots available for this schedule.');
        }

        $previousAttempts = \App\Models\Booking::where('app_id', $application->app_id)
            ->where('phase_type', $request->phase_type)
            ->count();

        \App\Models\Booking::create([
            'app_id' => $application->app_id,
            'schedule_id' => $request->schedule_id,
            'phase_type' => $request->phase_type,
            'booking_status' => 'Pending',
            'attempt_no' => $previousAttempts + 1,
        ]);

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
