<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Booking;
use App\Models\PaymentDetail;
use App\Models\Schedule;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // --- Charts Data ---

        // 1. Application Status Distribution
        $appStatusDistribution = Application::select('app_status', DB::raw('count(*) as total'))
            ->groupBy('app_status')
            ->pluck('total', 'app_status')
            ->toArray();

        $statusKeys = ['In-Progress', 'Completed'];
        $appStatusData = [];
        foreach ($statusKeys as $key) {
            $appStatusData[] = $appStatusDistribution[$key] ?? 0;
        }

        // 2. Bookings by Phase
        $bookingsByPhase = Booking::join('schedules', 'bookings.schedule_id', '=', 'schedules.schedule_id')
            ->select('schedules.phase_id', DB::raw('count(*) as total'))
            ->groupBy('schedules.phase_id')
            ->pluck('total', 'schedules.phase_id')
            ->toArray();

        $bookingPhaseData = [
            $bookingsByPhase[1] ?? 0,
            $bookingsByPhase[2] ?? 0,
            $bookingsByPhase[3] ?? 0
        ];

        // 3. Package Popularity
        $packagePopularity = Application::join('package', 'application.package_id', '=', 'package.package_id')
            ->select('package.package_type', DB::raw('count(*) as total'))
            ->groupBy('package.package_type')
            ->get();

        $packageLabels = $packagePopularity->pluck('package_type')->toArray();
        $packageData = $packagePopularity->pluck('total')->toArray();


        // --- Revenue ---
        // Total Revenue All Time
        $totalRevenueMonth = PaymentDetail::where('status', 'paid')
            ->sum('amount');

        // Revenue by Package
        $revenueByPackage = DB::table('payment_details')
            ->join('payments', 'payment_details.payment_id', '=', 'payments.payment_id')
            ->join('application', 'payments.app_id', '=', 'application.app_id')
            ->join('package', 'application.package_id', '=', 'package.package_id')
            ->where('payment_details.status', 'paid')
            ->select('package.package_type', DB::raw('SUM(payment_details.amount) as total_revenue'))
            ->groupBy('package.package_type')
            ->get();

        $revenueLabels = $revenueByPackage->pluck('package_type')->toArray();
        $revenueData = $revenueByPackage->pluck('total_revenue')->toArray();


        // --- Recent Activity Feed ---
        $latestApps = Application::with('student')->latest()->take(5)->get()->map(function ($app) {
            return [
                'type' => 'application',
                'message' => 'New application submitted by ' . ($app->student->full_name ?? $app->student->name ?? 'Unknown Student'),
                'timestamp' => $app->created_at,
                'icon_color' => 'blue'
            ];
        });

        $latestBookings = Booking::with(['student', 'schedule.phase'])->latest()->take(5)->get()->map(function ($booking) {
            $phaseName = $booking->schedule->phase->phase_name ?? 'Unknown Phase';

            return [
                'type' => 'booking',
                'message' => 'Booking confirmed for ' . ($booking->student->full_name ?? $booking->student->name ?? 'Unknown Student') . ' (' . $phaseName . ')',
                'timestamp' => $booking->created_at,
                'icon_color' => 'green'
            ];
        });

        $activityFeed = $latestApps->concat($latestBookings)->sortByDesc('timestamp')->take(8);

        return view('ui.admin.dashboard', compact(
            'appStatusData',
            'statusKeys',
            'bookingPhaseData',
            'packageLabels',
            'packageData',
            'totalRevenueMonth',
            'revenueLabels',
            'revenueData',
            'activityFeed'
        ));
    }
}
