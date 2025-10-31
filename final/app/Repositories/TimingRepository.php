<?php

namespace App\Repositories;

use App\Interfaces\TimingRepositoryInterface;
use App\Models\Timing;

class TimingRepository implements TimingRepositoryInterface
{
    public function all()
    {
        return Timing::all();
    }

    public function find($id)
    {
        return Timing::find($id);
    }

    public function update(int $id, array $data)
    {
        $timing = Timing::find($id);
        if ($timing) {
            $timing->update($data);

            return $timing;
        }

        return null;
    }

    public function create(array $data)
    {
        return Timing::create($data);
    }

    public function delete($id)
    {
        $timing = Timing::find($id);
        if ($timing) {

            return $timing->delete();
        }

        return false;
    }
}
