<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Package;

class ApplyController extends Controller
{
    public function create()
    {
        $classes = Classes::all();
        $packages = Package::all();
        return view('apply', compact('classes', 'packages'));
    }

    public function applied()
    {
        return view('applied');
    }
}


