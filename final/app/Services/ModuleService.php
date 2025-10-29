<?php

namespace App\Services;

use App\Interfaces\ModuleRepositoryInterface;
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
}
