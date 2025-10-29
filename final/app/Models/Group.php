<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        "group_number",
        "section_id",
        "nb_students",
        "default_room_id"
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function getModulesAttribute()
    {
        // Access the group's section, then its sector, then its modules
        return $this->section?->sector?->modules ?? collect();
    }
}
