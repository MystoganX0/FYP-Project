<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Package;

class PackageController extends Controller
{
    public function view()
    {
        // For user view (if needed) or admin view
        // The original code had view() returning 'package'. 
        // I will keep it but add the admin methods.
        return view('package');
    }

    public function index()
    {
        $packages = Package::all();
        return view('ui.admin.editpackage', compact('packages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'package_id' => 'required',
            'package_type' => 'required|string|max:255',
            'package_price' => 'required|numeric',
            'package_desc' => 'nullable|string',
        ]);

        try {
            $package = Package::findOrFail($request->package_id);
            $package->update([
                'package_type' => $request->package_type,
                'package_price' => $request->package_price,
                'package_desc' => $request->package_desc
            ]);

            return redirect()->back()->with('success', 'Package updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update package. Error: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'package_id' => 'required',
        ]);

        try {
            $package = Package::findOrFail($request->package_id);
            $package->delete();

            return redirect()->back()->with('success', 'Package deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete package. Error: ' . $e->getMessage());
        }
    }
}
