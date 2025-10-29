<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        "group_number",
        "sector_id",
        "nb_students",
        "default_room_id"
    ];
}
