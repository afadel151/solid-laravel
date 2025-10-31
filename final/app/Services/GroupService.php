<?php

namespace App\Services;

use App\Interfaces\GroupRepositoryInterface;
use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GroupService  {
    protected GroupRepositoryInterface $groupRepository;
    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function getAll(): Collection
    {
        return $this->groupRepository->all();
    }
    public function getById($id): Group|null
    {
        return $this->groupRepository->findById($id);
    }

    public function create(array $data):Group
    {
        return $this->groupRepository->create($data);
    }
    public function update(int $id,array $data): Group
    {
        return $this->groupRepository->update($id,$data);
    }
    public function delete(int $id): bool
    {
        return $this->groupRepository->delete($id);
    }
}
