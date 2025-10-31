<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Group extends Model
{
    protected $fillable = [
        'group_number',
        'section_id',
        'nb_students',
        'default_room_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function getModulesAttribute()
    {
        return $this->section?->sector?->modules ?? collect();
    }
    public function default_room()
    {
        return $this->belongsTo(Room::class,'default_room_id');
    }

    public function sessions():MorphMany
    {
        return $this->morphMany(LearningSession::class,'sessionable');
    }
}
