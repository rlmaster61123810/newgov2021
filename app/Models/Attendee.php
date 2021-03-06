<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'form_id',
        'type',
    ];

    // form()
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    // details
    public function details()
    {
        return $this->hasMany(AttendeeDetail::class);
    }
}
