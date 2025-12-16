<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classes;

class ApplyController extends Controller
{
    public function create()
    {
        $classes = Classes::all(); // fetch all license classes
        return view('apply', compact('classes'));
    }
}


