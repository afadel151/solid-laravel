<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'module_name',
    ];

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'sectors_modules', 'module_id', 'sector_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teachers_modules', 'module_id', 'teacher_id')
                    ->withPivot('lecture','lab','dw')
                    ->withTimestamps();
    }
    public function sessions()
    {
        return $this->hasMany(LearningSession::class);
    }
}
