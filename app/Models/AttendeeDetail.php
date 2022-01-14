<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendeeDetail extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'attendee_id',
        'fullname',
        'phone',
        'is_halal'
    ];
}
