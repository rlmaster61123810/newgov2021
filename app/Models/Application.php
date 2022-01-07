<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // approvals
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
