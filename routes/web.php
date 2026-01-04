<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

//user routes
Route::get('/', function () {
    $classes = \App\Models\Classes::all();
    return view('ui.user.home', compact('classes'));
})->name('home');
Route::get('/classes', [ClassController::class, 'index'])->name('class');
Route::get('/classes/{class_code}', [ClassController::class, 'show'])->name('package');
Route::get('/apply', [ApplyController::class, 'create'])->name('apply');
Route::post('/apply', [ApplyController::class, 'store'])->name('apply.store');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

//user booking routes
Route::get('/computer-slot', [BookingController::class, 'computer'])->name('computer');
Route::get('/practical-slot', [BookingController::class, 'practical'])->name('practical');
Route::get('/jpj-slot', [BookingController::class, 'jpj'])->name('jpj');
Route::get('/payment', [PaymentController::class, 'view'])->name('payment');
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/history', [ProfileController::class, 'history'])->name('history');
Route::get('/edit-class', [ClassController::class, 'view'])->name('editclass');
Route::post('/classes/store', [ClassController::class, 'store'])->name('classes.store');
Route::post('/classes/update', [ClassController::class, 'update'])->name('classes.update');
Route::post('/classes/delete', [ClassController::class, 'destroy'])->name('classes.delete');
Route::get('/applied-dashboard', [ApplyController::class, 'applied'])->name('applied');

//admin routes
Route::get('/dashboard', function () {
    return view('ui.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/bookings', [App\Http\Controllers\AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/admin/bookings/{id}/update', [App\Http\Controllers\AdminBookingController::class, 'updateStatus'])->name('admin.bookings.update');
    Route::delete('/admin/bookings/{id}', [App\Http\Controllers\AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');
    Route::get('/admin/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('admin.schedule');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/admin/student/update', [ApplyController::class, 'updateStudent'])->name('admin.student.update');
    Route::post('/admin/application/delete', [ApplyController::class, 'destroy'])->name('admin.application.delete');
});
