<?php

namespace App\Http\Controllers;

use App\Http\Requests\GlobalWeek\CreateGlobalWeekRequest;
use App\Http\Requests\GlobalWeek\UpdateGlobalWeekRequest;
use App\Http\Resources\GlobalWeek\GlobalWeekCollection;
use App\Http\Resources\GlobalWeek\GlobalWeekResource;
use App\Services\GlobalWeekService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class GlobalWeekController extends Controller
{
    protected $globalWeekService;

    public function __construct(GlobalWeekService $globalWeekService)
    {
        $this->globalWeekService = $globalWeekService;
    }
    //Route requests
    public function index()
    {
        $globalWeeks = $this->globalWeekService->getAll();

        return Inertia::render('global_weeks/Index', [
            'global_weeks' => new GlobalWeekCollection($globalWeeks),
        ]);

    }

    public function show($id)
    {
        $globalWeek = $this->globalWeekService->find($id);

        return Inertia::render('global_weeks/Show', [
            'global_week' => new GlobalWeekResource($globalWeek),
        ]);
    }



    //API requests

    public function get(int $id)
    {
        $globalWeek = $this->globalWeekService->find($id);
        return response()->json([
            'global_week'=>new GlobalWeekResource($globalWeek)
        ],200);
    }
    public function store(CreateGlobalWeekRequest $request)
    {
        $globalWeek = $this->globalWeekService->create($request->validated());

        return response()->json([
            'global_week'=> new GlobalWeekResource($globalWeek)
        ],200);

    }


    public function update(UpdateGlobalWeekRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $newGlobalWeek = $this->globalWeekService->update($id, $data);
        if ($newGlobalWeek) {
            return response()->json([
                'message' => 'Global week updated successfully.',
                'data' => new GlobalWeekResource($newGlobalWeek),
            ], 200);
        }

        return response()->json(['message' => 'Global week not found.'], 404);
    }

    public function destroy($id)
    {
        $destroyed = $this->globalWeekService->delete($id);
        if ($destroyed) {
            return response()->json(['message' => 'Global week deleted successfully.'], 200);
        } else {
            return response()->json(['message' => 'Global week not found.'], 404);
        }

    }
}
