<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalWeek extends Model
{
    protected $fillable = [
        'global_week_number',
        'global_week_type',
        'start_week_date',
    ];

    public function weeks()
    {
        return $this->hasMany(Week::class);
    }

    public function sessions()
    {
        return $this->hasManyThrough(LearningSession::class, Week::class);
    }
}
