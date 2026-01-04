<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('ui.user.class', compact('classes'));
    }

    public function show($class_code)
    {
        $class = Classes::where('class_code', $class_code)->firstOrFail();
        $packages = \App\Models\Package::all();
        return view('ui.user.package', compact('class', 'packages'));
    }

    public function view()
    {
        $classes = Classes::all();
        $packages = \App\Models\Package::all();
        return view('ui.admin.editclass', compact('classes', 'packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'class_code' => 'required|unique:classes',
            'class_price' => 'required|numeric',
            'class_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $data = $request->except(['class_image', '_token']);
            $data['class_code'] = strtoupper($request->class_code);

            if ($request->hasFile('class_image')) {
                $imageName = time() . '.' . $request->class_image->extension();
                $request->class_image->move(public_path('image/classes'), $imageName);
                $data['class_image'] = 'image/classes/' . $imageName;
            }

            Classes::create($data);

            return redirect()->back()->with('success', 'Class added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add class. Error: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'class_name' => 'required',
            'class_code' => 'required',
            'class_price' => 'required|numeric',
            'class_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $class = Classes::findOrFail($request->class_id);

            $data = $request->except(['class_image', '_token', 'class_id']);
            $data['class_code'] = strtoupper($request->class_code);

            if ($request->hasFile('class_image')) {
                // Delete old image if exists
                if ($class->class_image && file_exists(public_path($class->class_image))) {
                    if ($class->class_image != 'image/classes/b.png') { // Prevent deleting default if hardcoded
                        unlink(public_path($class->class_image));
                    }
                }
                $imageName = time() . '.' . $request->class_image->extension();
                $request->class_image->move(public_path('image/classes'), $imageName);
                $data['class_image'] = 'image/classes/' . $imageName;
            }

            $class->update($data);

            return redirect()->back()->with('success', 'Class updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update class. Error: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
        ]);

        try {
            $class = Classes::findOrFail($request->class_id);

            // Delete image if exists
            if ($class->class_image && file_exists(public_path($class->class_image))) {
                if ($class->class_image != 'image/classes/b.png') {
                    unlink(public_path($class->class_image));
                }
            }

            $class->delete();

            return redirect()->back()->with('success', 'Class deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete class. Error: ' . $e->getMessage());
        }
    }
}
