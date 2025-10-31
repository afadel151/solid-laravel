<?php

namespace App\Services;

use App\Interfaces\RoomRepositoryInterface;

class RoomService
{
    protected $roomrepository;

    public function __construct(RoomRepositoryInterface $roomrepository)
    {
        $this->roomrepository = $roomrepository;
    }

    public function getAll()
    {
        return $this->roomrepository->all();
    }

    public function getById($id)
    {
        return $this->roomrepository->find($id);
    }

    public function create(array $data)
    {
        $room = $this->roomrepository->create($data);

        return $room;
    }

    public function update(int $id, array $data)
    {
        $room = $this->roomrepository->update($id, $data);

        return $room;

    }

    public function delete(int $id)
    {
        return $this->roomrepository->delete($id);
    }
}
