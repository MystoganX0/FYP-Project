<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Payment;
use App\Models\PaymentDetail;

class ApplyController extends Controller
{
    public function create()
    {
        $classes = Classes::all();
        $packages = Package::all();

        $hasActiveApplication = false;
        if (Auth::check()) {
            $hasActiveApplication = Application::where('student_id', Auth::id())->exists();
        }

        return view('ui.user.apply', compact('classes', 'packages', 'hasActiveApplication'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ic' => 'required|numeric|digits:12',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'ic_file' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'class_id' => 'required|exists:classes,class_id',
            'package_id' => 'required|exists:package,package_id',
            'payment_type' => 'required|in:full,installment',
        ]);

        try {
            DB::beginTransaction();

            $path = null;
            if ($request->hasFile('ic_file')) {
                $file = $request->file('ic_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/ic', $filename, 'public');
            }

            // Create Application
            $app = new \App\Models\Application();
            $app->student_id = \Illuminate\Support\Facades\Auth::id() ?? 1; // Fallback or handle auth check
            $app->current_stage = 'Computer Test';
            $app->app_status = 'In-Progress';
            $app->class_id = $request->class_id;
            $app->package_id = $request->package_id;
            $app->save();

            // Update Student Details
            $student = \App\Models\Student::find($app->student_id);
            if ($student) {
                $student->ic = $request->ic;
                $student->full_name = $request->full_name;
                $student->phone = $request->phone;
                $student->address = $request->address;
                $student->ic_file = $path;
                $student->save();
            }

            // Calculate Amount
            $class = Classes::where('class_id', $request->class_id)->firstOrFail();
            $package = Package::where('package_id', $request->package_id)->firstOrFail();
            $totalAmount = $class->class_price + $package->package_price;

            // Create Payment
            $payment = new \App\Models\Payment();
            $payment->app_id = $app->app_id;
            $payment->payment_type = $request->payment_type;
            $payment->total_amount = $totalAmount;
            $payment->status = 'pending';
            $payment->save();

            // Create Details
            if ($request->payment_type == 'full') {
                $detail = new \App\Models\PaymentDetail();
                $detail->payment_id = $payment->payment_id;
                $detail->stage = 'Full Payment';
                $detail->amount = $totalAmount;
                $detail->status = 'pending';
                $detail->save();
            } else {
                // Installment logic: 3 stages (50%, 30%, 20%)
                $stages = [
                    ['name' => 'Stage 1', 'rate' => 0.50],
                    ['name' => 'Stage 2', 'rate' => 0.30],
                    ['name' => 'Stage 3', 'rate' => 0.20],
                ];

                foreach ($stages as $stage) {
                    $detail = new \App\Models\PaymentDetail();
                    $detail->payment_id = $payment->payment_id;
                    $detail->stage = $stage['name'];
                    $detail->amount = number_format($totalAmount * $stage['rate'], 2, '.', '');
                    $detail->status = 'pending';
                    $detail->save();
                }
            }

            DB::commit();
            return redirect()->route('payment', ['payment_id' => $payment->payment_id])->with('success', 'Application submitted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error submitting application: ' . $e->getMessage())->withInput();
        }
    }

    public function applied()
    {
        $student_id = Auth::id() ?? 1;
        $applications = Application::where('student_id', $student_id)->with(['payment', 'payment.details', 'class', 'package'])->get();
        return view('ui.admin.applied', compact('applications'));
    }
}


