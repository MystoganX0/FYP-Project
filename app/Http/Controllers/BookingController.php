<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function computer()
    {
        $studentId = \Illuminate\Support\Facades\Auth::id();
        $application = \App\Models\Application::with('class')->where('student_id', $studentId)->latest()->first();
        return view('computer', compact('application'));
    }

    public function practical()
    {
        return view('practical');
    }

    public function jpj()
    {
        return view('jpj');
    }
}
