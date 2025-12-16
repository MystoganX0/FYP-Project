<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function computer()
    {
        return view('computer');
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
