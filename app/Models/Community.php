<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;


    // render sub_district enum to string
    public function getSubDistrictAttribute($value)
    {
        // "NAKORNPING", "KAWILA", "MENGRAI", "SRIVICHAI"
        switch ($value) {
            case "NAKORNPING":
                return "นครพิงค์";
            case "KAWILA":
                return "กาวิละ";
            case "MENGRAI":
                return "เม็งราย";
            case "SRIVICHAI":
                return "ศรีวิชัย";
            default:
                return "";
        }
    }
}
