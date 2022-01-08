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

    // render enum to string
    public function getProductTypeAttribute($value)
    {
        switch ($value) {
            case 'FOOD':
                return 'อาหาร';
            case 'SOUVENIR':
                return 'ของทาน';
            case 'BEVERAGE':
                return 'เครื่องดื่ม';
            case 'HERB':
                return 'สมุนไพร';
            case 'CLOTHES':
                return 'เสื้อผ้า';
            case 'OTHER':
                return 'อื่นๆ';
        }
    }
}
