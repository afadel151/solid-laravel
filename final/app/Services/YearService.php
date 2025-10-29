<?php

namespace App\Services;

use App\Interfaces\YearRepositoryInterface;
use App\Models\Year;
use Illuminate\Database\Eloquent\Collection;

class YearService
{
    // Contains business rules — validation beyond basic form request, conflict checking, triggering other domain events.

    public function __construct(protected YearRepositoryInterface $repository) {}

    public function getYear(int $id): Year
    {
        return $this->repository->find($id);
    }

    public function getAllYears(): Collection
    {
        return $this->repository->all();
    }

    public function deleteYear(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createYear(array $data): Year
    {
        return $this->repository->create($data);
    }
}
