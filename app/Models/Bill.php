<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    // approval
    public function approval()
    {
        return $this->belongsTo(Approval::class);
    }

    // user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
