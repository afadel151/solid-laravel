<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    // Here define Relationship with Sections, and Weeks
    protected $fillable = [
        'year',
    ];

    // Reashionships:
    public function sectors(): HasMany
    {
        return $this->hasMany(Sector::class);
    }
    public function sections()
    {
        return $this->hasManyThrough(Section::class, Sector::class,'year_id','sector_id','id','id');
    } 
    public function weeks(): HasMany
    {
        return $this->hasMany(Week::class);
    }
}
