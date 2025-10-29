<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    // Here define Relationship with Sections, and Weeks
    protected $fillable = [
        "year"
    ];

    // Reashionships:
    public function sections(): HasMany 
    {
        return $this->hasMany(Section::class);
    }
    public function weeks(): HasMany 
    {
        return $this->hasMany(Week::class);
    }
}
