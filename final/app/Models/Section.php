<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Section extends Model
{
    protected $fillable = [
        'section_number',
        'sector_id',
        'default_room_id',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
    public function year()
    {
        return $this->hasOneThrough(Year::class,Sector::class,'id','id','sector_id','year_id');
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
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
