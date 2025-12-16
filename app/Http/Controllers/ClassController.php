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

    public function show($id)
    {
        $class = Classes::findOrFail($id); // get one record
        return view('package', compact('class'));
    }

    public function view()
    {
        return view('editclass'); 
    }
    
}
