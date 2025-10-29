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

    public function getAllTimings()
    {
        return $this->timingRepository->all();
    }

    public function getTimingById($id)
    {
        return $this->timingRepository->find($id);
    }

    public function updateTiming(array $data)
    {
        return $this->timingRepository->update($data);
    }

    public function createTiming(array $data)
    {
        return $this->timingRepository->create($data);
    }

    public function deleteTiming($id)
    {
        return $this->timingRepository->delete($id);
    }
}
