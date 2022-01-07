<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    // bills
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    // user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // sale_area
    public function sale_area()
    {
        return $this->belongsTo(SaleArea::class);
    }

    //  application
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
