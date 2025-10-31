<?php

namespace App\Services;

use App\Interfaces\GlobalWeekRepositoryInterface;

class GlobalWeekService
{
    protected $globalWeekRepository;

    public function __construct(GlobalWeekRepositoryInterface $globalWeekRepository)
    {
        $this->globalWeekRepository = $globalWeekRepository;
    }

    public function getAll()
    {
        return $this->globalWeekRepository->all();
    }

    public function find($id)
    {
        return $this->globalWeekRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->globalWeekRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->globalWeekRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->globalWeekRepository->delete($id);
    }
}
