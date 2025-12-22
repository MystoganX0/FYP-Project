<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $table = 'payment_details';
    protected $primaryKey = 'detail_id';
    protected $fillable = [
        'payment_id',
        'stage',
        'amount',
        'status',
        'payment_date'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
