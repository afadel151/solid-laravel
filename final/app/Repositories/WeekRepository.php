<?php

namespace App\Repositories;

use App\Interfaces\WeekRepositoryInterface;
use App\Models\Week;

class WeekRepository implements WeekRepositoryInterface {
    public function all()
    {
        return Week::all();
    }
    public function find($id)
    {
        return Week::find($id);
    }
    public function create(array $data)
    {
        return Week::create($data);
    }
    public function update(int $id,array $data)
    {
        $week = Week::find($id);
        if ($week) {
            $week->update($data);
            return $week;
        }
        return null;
    }
    public function delete(int $id)
    {
        $week = Week::find($id);
        if ($week) {
            return $week->delete();
        }
        return false;
    }
}
