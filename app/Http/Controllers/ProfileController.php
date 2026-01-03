<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Application;

class ProfileController extends Controller
{
    public function history()
    {
        $studentId = Auth::id();
        $application = Application::with(['class', 'package', 'payment', 'payment.details'])
            ->where('student_id', $studentId)
            ->latest()
            ->first();

        $computerTest = \App\Models\Booking::where('student_id', $studentId)
            ->whereHas('schedule', function ($q) {
                $q->where('phase_id', 1);
            })
            ->whereHas('attempt', function ($q) {
                $q->where('result', 'Pass');
            })
            ->with(['schedule', 'attempt'])
            ->latest()
            ->first();

        // 3. Fetch Completed Practical Training Bookings
        $practicalBookings = \App\Models\Booking::where('student_id', $studentId)
            ->whereHas('schedule', function ($q) {
                $q->where('phase_id', 2);
            })
            ->whereIn('booking_status', ['Done', 'Completed'])
            ->with('schedule')
            ->orderBy('created_at', 'asc') // Order by completion sequence
            ->get();

        // 4. Fetch Passed JPJ Test
        $jpjTest = \App\Models\Booking::where('student_id', $studentId)
            ->whereHas('schedule', function ($q) {
                $q->where('phase_id', 3);
            })
            ->whereHas('attempt', function ($q) {
                $q->where('result', 'Pass');
            })
            ->with(['schedule', 'attempt'])
            ->latest()
            ->first();

        return view('ui.user.history', compact('application', 'computerTest', 'practicalBookings', 'jpjTest'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
