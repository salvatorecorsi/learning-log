<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];

    use HasFactory;
}
