<?php

namespace App\Repositories;

use App\Interfaces\SectorRepositoryInterface;
use App\Models\Sector;

class SectorRepository implements SectorRepositoryInterface
{
    public function all()
    {
        return Sector::all();
    }

    public function find($id)
    {
        return Sector::find($id);
    }

    public function create(array $data)
    {
        return Sector::create($data);
    }

    public function update(int $id, array $data)
    {
        $sector = Sector::find($id);
        if ($sector) {
            $sector->update($data);

            return $sector;
        }

        return null;
    }

    public function delete(int $id): bool
    {
        return Sector::find($id)->delete();
    }
}
