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
        'ic',
        'full_name',
        'phone',
        'address',
        'ic_file',
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
}
