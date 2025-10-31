<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectorModule extends Model
{
    protected $table = 'sectors_modules';
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
