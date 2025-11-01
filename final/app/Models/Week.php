<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Week extends Model
{
    protected $fillable = [
        'global_week_id',
        'week_type',
        'year_id',
        'semester',
    ];

    // Relashionships:
    public function global_week(): BelongsTo
    {
        return $this->belongsTo(GlobalWeek::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(LearningSession::class);
    }
}
