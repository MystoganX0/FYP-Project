<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'class_id';
    protected $fillable = ['class_code', 'class_name', 'class_price', 'class_image'];
    public $timestamps = false;
}
