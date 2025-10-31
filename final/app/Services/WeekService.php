<?php

namespace App\Services;

use App\Interfaces\WeekRepositoryInterface;

class WeekService
{
    protected $weekRepository;

    public function __construct(WeekRepositoryInterface $weekRepository)
    {
        $this->weekRepository = $weekRepository;
    }

    public function getAll()
    {
        return $this->weekRepository->all();
    }

    public function getById($id)
    {
        return $this->weekRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->weekRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->weekRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->weekRepository->delete($id);
    }
}
