<?php

namespace App\Repositories;

use App\Interfaces\YearRepositoryInterface;
use App\Models\Year;
use Illuminate\Database\Eloquent\Collection;

class YearRepository implements YearRepositoryInterface
{
    // Handles all persistence (CRUD) logic — querying, inserting, updating, deleting Years.
    public function __construct(protected Year $model) {}

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find($id): Year
    {
        return $this->model->find($id);
    }

    public function create(array $data): Year
    {
        return $this->model->create($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
