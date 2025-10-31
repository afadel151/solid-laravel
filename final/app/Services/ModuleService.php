<?php

namespace App\Services;

use App\Interfaces\ModuleRepositoryInterface;
use App\Models\Module;
use Illuminate\Database\Eloquent\Collection;

class ModuleService
{
    protected $moduleRepository;

    public function __construct(ModuleRepositoryInterface $repo)
    {
        $this->moduleRepository = $repo;
    }

    public function all(): Collection
    {
        return $this->moduleRepository->all();
    }
    public function find(int $id): Module|null
    {
        return $this->moduleRepository->findModuleById($id);
    }
    public function create(array $data): Module
    {
        return $this->moduleRepository->create($data);
    }
    public function update(int $id, array $data): Module
    {
        return $this->moduleRepository->update($id, $data);
    }
    public function delete(int $id): bool
    {
        $module = $this->find($id);
        if (!$module) {
            return false;
        }
        return $this->moduleRepository->delete($id);
    }

}
