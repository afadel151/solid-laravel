<?php

namespace App\Services;

use App\Interfaces\SectorRepositoryInterface;

class SectorService 
{
    protected $sectorrepository;

    public function __construct(SectorRepositoryInterface $repository)
    {
        $this->sectorrepository = $repository;
    }

    public function getAll()
    {
        return $this->sectorrepository->all();
    }

    public function getById($id)
    {
        return $this->sectorrepository->find($id);
    }

    public function create(array $data)
    {
        $sector = $this->sectorrepository->create($data);

        return $sector;
    }

    public function update(int $id,array $data)
    {
        $sector = $this->sectorrepository->update($id,$data);

        return $sector;
    }

    public function delete(int $id)
    {
        return $this->sectorrepository->delete($id);
    }
}
