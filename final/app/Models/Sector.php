<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sector extends Model
{
    protected $table = "sectors";




    // relationships

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function modules():BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'sectors_modules', 'sector_id', 'module_id');
    }
}
