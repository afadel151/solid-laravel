<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class LearningSession extends Model
{
    protected $table = 'learning_sessions';

    protected $fillable = [
        'timing_id',
        'week_id',
        'session_date',
        'module_id',
        'teacher_id',
        'session_type',
        'sessionable_type',
        'sessionable_id',
        'room_id',
        'absented',
        'caughtup',
    ];

    /*
     *
     * @return void
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function sessionable(): MorphTo
    {
        return $this->morphTo();
    }
}
