<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = ['admin_email', 'admin_pass'];

    public function getAuthPassword()
    {
        return $this->admin_pass;
    }
}
