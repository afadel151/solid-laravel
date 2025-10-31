<?php

namespace App\Interfaces;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

interface GroupRepositoryInterface {
    public function all(): Collection;
    public function findById(int $id):Group|null;

    public function create(array $data): Group;
    public function update( array $data): Group;
    public function delete(int $id): bool;
}
