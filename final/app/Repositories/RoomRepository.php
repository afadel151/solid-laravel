<?php

namespace App\Repositories;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;

class RoomRepository implements RoomRepositoryInterface {
    public function all()
    {
        return Room::all();
    }
    public function find($id)
    {
        return Room::find($id);
    }
    public function create(array $data)
    {
        return Room::create($data);
    }
    public function update(int $id,array $data)
    {
        $room = Room::find($id);
        if($room){
            $room->update($data);
            return $room;
        }
        return null;
    }
    public function delete(int $id)
    {
        $room = Room::find($id);
        if($room){
            return $room->delete();
        }
        return false;
    }
}
