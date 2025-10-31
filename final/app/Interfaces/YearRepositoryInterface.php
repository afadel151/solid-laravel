<?php

namespace App\Interfaces;

use App\Models\Year;

interface YearRepositoryInterface
{
    public function find($id): Year;

    public function create(array $data);

    public function delete(int $id);

    public function all();

    public function update(int $id, array $data);
}
