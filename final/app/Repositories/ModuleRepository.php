<?php

namespace App\Repositories;

use App\Interfaces\ModuleRepositoryInterface;
use App\Models\Module;
use Illuminate\Database\Eloquent\Collection;

class ModuleRepository implements ModuleRepositoryInterface
{
    public function all(): Collection
    {
        return Module::with('teachers','sectors')->get();
    }

    public function findModuleById(int $id): ?Module
    {
        return Module::find($id);
    }

    public function findModuleByName(string $name): ?Module
    {
        return Module::where('name', $name)->first();
    }

    public function create(array $data): Module
    {
        return Module::create($data);
    }

    public function update(int $id, array $data): Module
    {
        $module = $this->findModuleById($id);
        if ($module) {
            $module->update($data);
        }

        return $module;
    }

    public function delete(int $id): bool
    {
        $module = $this->findModuleById($id);
        if ($module) {
            return $module->delete();
        }

        return false;
    }
}
