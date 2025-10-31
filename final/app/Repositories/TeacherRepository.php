<?php

namespace App\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function all()
    {
        return Teacher::all();
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
