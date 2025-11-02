<?php

namespace App\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function all()
    {
        return Teacher::withCount([
            'modules',
            'sessions as absent_sessions_count' => function ($query) {
                $query->where('absented', true)
                ->where('caughtup', false);
            },
        ])->get();
    }

    public function find($id)
    {
        return Teacher::find($id);
    }

    public function create(array $data)
    {
        return Teacher::create($data);
    }

    public function update(int $id, array $data)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->update($data);

            return $teacher;
        }

        return null;
    }

    public function delete($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            return $teacher->delete();
        }

        return false;
    }
}
