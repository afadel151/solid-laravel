<?php 



namespace App\Repositories;

use App\Interfaces\SectorRepositoryInterface;
use App\Models\Sector;
use Illuminate\Support\Collection;


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
    public function update(array $data)
    {
        return Sector::find($data['id'])->update($data);
    }
    public function delete(int $id): bool
    {
        return Sector::find($id)->delete();
    }
}