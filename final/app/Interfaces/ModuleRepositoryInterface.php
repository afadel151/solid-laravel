<?php

namespace App\Interfaces;

use App\Models\Module;
use Illuminate\Database\Eloquent\Collection;

interface ModuleRepositoryInterface
{
    public function all(): Collection;

    public function findModuleById(int $id): ?Module;

    public function findModuleByName(string $name): ?Module;

    public function create(array $data): Module;

    public function update(int $id, array $data): Module;

    public function delete(int $id): bool;
}
