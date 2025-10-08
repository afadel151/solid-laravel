<?php

namespace App\Repositories;

use App\Contracts\TeacherRepositoryInterface;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function __construct(protected Teacher $model)
    {
        //
    }
    public function all()
    {
        return Teacher::all();
    }

    public function find(int $id)
    {
        return Teacher::findOrFail($id);
    }

    public function create(array $data)
    {
        return Teacher::create($data);
    }

    public function update(int $id, array $data)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($data);
        return $teacher;
    }

    public function delete(int $id)
    {
        return Teacher::destroy($id);
    }
}