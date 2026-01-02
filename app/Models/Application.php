<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'application';
    protected $primaryKey = 'app_id';
    protected $fillable = [
        'student_id',
        'class_id',
        'package_id',
        'app_status',
        'current_stage'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'app_id');
    }

    public function updateStage()
    {
        $computerTest = $this->bookings()->whereHas('schedule', fn($q) => $q->where('phase_id', 1))->where('booking_status', 'Done')->exists();
        $practicalTraining = $this->bookings()->whereHas('schedule', fn($q) => $q->where('phase_id', 2))->where('booking_status', 'Done')->count();
        $jpjTest = $this->bookings()->whereHas('schedule', fn($q) => $q->where('phase_id', 3))->where('booking_status', 'Done')->exists();

        if ($jpjTest) {
            $this->update(['current_stage' => 'Completed']);
            return;
        }

        if ($practicalTraining >= 5) {
            $this->update(['current_stage' => 'Jpj Test']);
            return;
        }

        if ($computerTest) {
            $this->update(['current_stage' => 'Practical Training']);
            return;
        }

        // Default or initial stage
        $this->update(['current_stage' => 'Computer Test']);
    }

    // Bookings are now accessed via Student, but we can keep a helper accessor if needed, 
    // or better, remove this direct relation as it's no longer direct.
    // However, for code compatibility, we can perform a hasManyThrough or similar?
    // Actually, Student <-> Application (1:N or 1:1) and Student <-> Booking (1:N).
    // Application -> Booking is no longer a direct parent.
    // We'll remove this method to force code updates to use correct path.
}
