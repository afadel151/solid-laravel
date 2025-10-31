<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'teacher_name',
        'teacher_grade',
        'teacher_email',
    ];


    public function modules()
    {
        return $this->belongsToMany(Module::class, 'teachers_modules', 'teacher_id', 'module_id')
                    ->withPivot('lecture','lab','dw')
                    ->withTimestamps();
    }

    public function sessions()
    {
        return $this->hasMany(LearningSession::class);
    }
}
