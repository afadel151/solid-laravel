<?php

namespace App\Repositories;

use App\Interfaces\GroupRepositoryInterface;
use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GroupRepository implements GroupRepositoryInterface
{
    public function all(): Collection
    {
        return Group::all();
    }

    public function findById(int $id): ?Group
    {
        return Group::find($id);
    }

    public function create(array $data): Group
    {
        return Group::create($data);
    }

    public function update(int $id, array $data): Group
    {
        $group = $this->findById($id);
        if ($group) {
            $group->update($data);
        }

        return $group;
    }

    public function delete(int $id): bool
    {
        $group = $this->findById($id);
        if ($group) {
            return $group->delete();
        }

        return false;
    }
}
