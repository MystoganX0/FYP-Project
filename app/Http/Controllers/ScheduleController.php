<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Schedule;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function index()
    {
        $schedules = Schedule::with('phase')->orderBy('date', 'desc')->get();

        $computerSchedules = $schedules->where('phase_id', 1);
        $practicalSchedules = $schedules->where('phase_id', 2);
        $jpjSchedules = $schedules->where('phase_id', 3);

        return view('ui.admin.schedule', compact('schedules', 'computerSchedules', 'practicalSchedules', 'jpjSchedules'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'time_out' => 'required',
            'day' => 'required|string',
            'phase_id' => 'required|exists:phase,phase_id',
            'slot' => 'required|integer|min:1',
            'duration' => 'required|string',
        ]);

        $user = Auth::guard('admin')->user();
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to create a schedule.');
        }

        Schedule::create([
            'date' => $request->date,
            'start_time' => $request->start_time,
            'time_out' => $request->time_out,
            'day' => $request->day,
            'phase_id' => $request->phase_id,
            'slot' => $request->slot,
            'duration' => $request->duration,
            'admin_id' => $user->admin_id,
        ]);

        return redirect()->back()->with('success', 'Schedule created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,schedule_id',
            'date' => 'required|date',
            'start_time' => 'required',
            'time_out' => 'required',
            'day' => 'required|string',
            'phase_id' => 'required|exists:phase,phase_id',
            'slot' => 'required|integer|min:1',
            'duration' => 'required|string',
        ]);

        $schedule = Schedule::findOrFail($request->schedule_id);
        $schedule->update([
            'date' => $request->date,
            'start_time' => $request->start_time,
            'time_out' => $request->time_out,
            'day' => $request->day,
            'phase_id' => $request->phase_id,
            'slot' => $request->slot,
            'duration' => $request->duration,
        ]);

        return redirect()->back()->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,schedule_id',
        ]);

        $schedule = Schedule::findOrFail($request->schedule_id);
        $schedule->delete();

        return redirect()->back()->with('success', 'Schedule deleted successfully.');
    }
}
