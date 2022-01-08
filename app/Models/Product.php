<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'name',
    ];

    // application
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
