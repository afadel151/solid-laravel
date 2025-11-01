<?php

namespace App\Repositories;

use App\Interfaces\GlobalWeekRepositoryInterface;
use App\Models\GlobalWeek;
use App\Models\Week;
use Carbon\Carbon;

class GlobalWeekRepository implements GlobalWeekRepositoryInterface
{
    public function all()
    {
        return GlobalWeek::with(['weeks', 'weeks.sessions'])->get();
    }

    public function find($id)
    {
        return GlobalWeek::find($id);
    }

    public function create(array $data)
    {

        $lastGlobalWeek = GlobalWeek::orderByDesc('start_week_date')->first();
        $start_date = $lastGlobalWeek
        ? Carbon::parse($lastGlobalWeek->start_week_date)->addDays(7)
        : Carbon::now()->next(Carbon::SUNDAY);
        $global_week = GlobalWeek::create([
            'global_week_number' => GlobalWeek::all()->count() + 1, // optional numbering
            'start_week_date' => $start_date,
        ]);
        $new_weeks = $data['new_weeks'];
        foreach ($new_weeks as $key => $new_week) {
            Week::create([
                'global_week_id'=>$global_week->id,
                'year_id' => $key,
                'week_type' => $new_week['week_type'],
                'semester' => $new_week['week_semester'],
            ]);
        }
        $global_week->load('weeks');

        return $global_week;
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
