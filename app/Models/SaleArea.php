<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleArea extends Model
{
    use HasFactory;

    // approvals
    public function approvals()
    {
        return $this->hasMany('App\Models\Approval');
    }
}
