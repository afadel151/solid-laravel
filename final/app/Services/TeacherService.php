<?php

namespace App\Services;

use App\Interfaces\TeacherRepositoryInterface;

class TeacherService  {
    protected $teacherRepository;
    public function __construct(TeacherRepositoryInterface $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }
    public function find($id)
    {
        return $this->teacherRepository->find($id);
    }

    public function getAll()
    {
        return $this->teacherRepository->all();
    }
    public function create(array $data)
    {
        $teacher = $this->teacherRepository->create($data);
        return $teacher;
    }
    public function update(int $id,array $data)
    {
        $updatedTeacher = $this->teacherRepository->update($id, $data);
        return $updatedTeacher;
    }
    public function delete(int $id)
    {
        return $this->teacherRepository->delete($id);
    }
}
