<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_Active'
    ];

    public function getIsActiveAttribute($value)
    {

        return ($value == 1) ? 'Active' : 'In Active';
    }
}
