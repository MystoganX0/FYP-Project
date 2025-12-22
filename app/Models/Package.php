<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';
    protected $primaryKey = 'package_id';
    protected $fillable = ['package_type', 'package_price'];
}
