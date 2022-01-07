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

    // attendees
    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    // community
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
