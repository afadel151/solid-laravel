<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_name',
        'teaching_capacity',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class, 'default_room_id');
    }
    public function sections()
    {
        return $this->hasMany(Section::class, 'default_room_id');
    }
}
