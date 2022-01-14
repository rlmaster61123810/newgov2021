<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    // project()
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // attendee
    public function attendee()
    {
        return $this->hasOne(Attendee::class);
    }

    // community
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
