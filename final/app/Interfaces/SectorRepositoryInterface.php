<?php

namespace App\Interfaces;

interface SectorRepositoryInterface
{
    public function find(int $id);

    public function all();

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id): bool;
}
