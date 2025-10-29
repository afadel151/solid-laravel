<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherModule extends Model
{
    protected $table = "teachers_modules";
    protected $fillable = [
        "teacher_id",
        "module_id",
        "lecture",
        "dw",
        "lab"
    ];
}
