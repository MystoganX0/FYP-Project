<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('class', compact('classes'));
    }

    public function show($class_code)
    {
        $class = Classes::where('class_code', $class_code)->firstOrFail();
        $packages = \App\Models\Package::all();
        return view('package', compact('class', 'packages'));
    }

    public function view()
    {
        return view('editclass');
    }

}
