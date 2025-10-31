<?php

namespace App\Services;

use App\Interfaces\YearRepositoryInterface;
use App\Models\Year;
use Illuminate\Database\Eloquent\Collection;

class YearService
{
    // Contains business rules — validation beyond basic form request, conflict checking, triggering other domain events.

    public function __construct(protected YearRepositoryInterface $repository) {}

    public function find(int $id): Year
    {
        return $this->repository->find($id);
    }

    public function getAll(): Collection
    {
        return $this->repository->all();
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function create(array $data): Year
    {
        return $this->repository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
