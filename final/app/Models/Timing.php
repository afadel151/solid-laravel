<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    protected $fillable = [
        'session_start',
        'session_finish',
    ];
}
