<?php

namespace App\Services;

use App\Interfaces\TimingRepositoryInterface;

class TimingService
{
    protected $timingRepository;

    public function __construct(TimingRepositoryInterface $timingRepository)
    {
        $this->timingRepository = $timingRepository;
    }

    public function getAll()
    {
        return $this->timingRepository->all();
    }

    public function getById($id)
    {
        return $this->timingRepository->find($id);
    }

    public function update(int $id, array $data)
    {
        return $this->timingRepository->update($id, $data);
    }

    public function create(array $data)
    {
        return $this->timingRepository->create($data);
    }

    public function delete($id)
    {
        return $this->timingRepository->delete($id);
    }
}
