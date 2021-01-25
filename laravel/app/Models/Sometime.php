<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sometime extends Model
{
    use HasFactory;

    public function scopeSearchBySometime($query)
    {
        return $query;
    }
}
