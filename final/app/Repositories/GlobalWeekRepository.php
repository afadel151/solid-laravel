<?php

namespace App\Repositories;

use App\Interfaces\GlobalWeekRepositoryInterface;
use App\Models\GlobalWeek;

class GlobalWeekRepository implements GlobalWeekRepositoryInterface
{
    public function all()
    {
        return GlobalWeek::with(['weeks'])->get();
    }

    public function find($id)
    {
        return GlobalWeek::find($id);
    }

    public function create(array $data)
    {
        return GlobalWeek::create($data);
    }

    public function update(int $id, array $data)
    {
        $globalWeek = GlobalWeek::find($id);
        if ($globalWeek) {
            $globalWeek->update($data);

            return $globalWeek;
        }

        return null;
    }

    public function delete(int $id)
    {
        $globalWeek = GlobalWeek::find($id);
        if ($globalWeek) {
            return $globalWeek->delete();
        }

        return false;
    }
}
