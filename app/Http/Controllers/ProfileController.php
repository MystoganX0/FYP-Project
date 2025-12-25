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

        $computerTest = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })
            ->where('phase_type', 'Computer Test')
            ->where('booking_status', 'Done')
            ->with('schedule')
            ->latest()
            ->first();

        // 3. Fetch Completed Practical Training Bookings
        $practicalBookings = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })
            ->where('phase_type', 'Practical Slot')
            ->where('booking_status', 'Done')
            ->with('schedule')
            ->orderBy('created_at', 'asc') // Order by completion sequence
            ->get();

        // 4. Fetch Passed JPJ Test
        $jpjTest = \App\Models\Booking::whereHas('application', function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })
            ->where('phase_type', 'Jpj Test')
            ->where('booking_status', 'Done')
            ->with('schedule')
            ->latest()
            ->first();

        return view('history', compact('application', 'computerTest', 'practicalBookings', 'jpjTest'));
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
