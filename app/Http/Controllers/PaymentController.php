<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function view(Request $request)
    {
        $query = Payment::with(['application.class', 'application.package', 'details']);

        if ($request->has('payment_id')) {
            $payment = $query->find($request->payment_id);
        } else {
            // Fallback: Get latest pending payment for user
            $user_id = Auth::id() ?? 1;
            $payment = $query->whereHas('application', function ($q) use ($user_id) {
                $q->where('student_id', $user_id);
            })->latest()->first();
        }

        // If no payment found (e.g. direct access without prior application), handle gracefully
        // For now, we pass $payment as null if not found, view should handle it or we redirect
        if (!$payment) {
            return redirect()->route('apply')->with('error', 'Please submit an application first.');
        }

        return view('payment', compact('payment'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'payment_id' => 'required|exists:payments,payment_id'
        ]);

        $payment = Payment::with('details')->find($request->payment_id);

        if (!$payment) {
            return response()->json(['success' => false, 'message' => 'Payment not found'], 404);
        }

        // Find the first pending detail
        $pendingDetail = $payment->details->where('status', 'pending')->first();

        if ($pendingDetail) {
            $pendingDetail->status = 'paid';
            $pendingDetail->save();
        }

        // Check if all details are done
        $remainingPending = $payment->details()->where('status', 'pending')->count();
        if ($remainingPending === 0) {
            $payment->status = 'completed';
        } else {
            // Optional: Set to partial if not already
            $payment->status = 'partial';
        }
        $payment->save();

        return response()->json(['success' => true]);
    }
}
