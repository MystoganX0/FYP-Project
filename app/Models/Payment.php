<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'app_id',
        'payment_type',
        'total_amount',
        'status'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'app_id');
    }

    public function details()
    {
        return $this->hasMany(PaymentDetail::class, 'payment_id');
    }
}
