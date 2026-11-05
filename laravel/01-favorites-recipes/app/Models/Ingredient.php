<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function ingredients(): BelongsToMany {
        return $this->belongsToMany(Ingredient::class);
    }
}
