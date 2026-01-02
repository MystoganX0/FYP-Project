<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{
    protected $primaryKey = 'schedule_id';
    protected $guarded = [];

    public function phase()
    {
        return $this->belongsTo(Phase::class, 'phase_id');
    }
}
