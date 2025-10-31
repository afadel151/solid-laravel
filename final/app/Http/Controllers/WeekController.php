<?php

namespace App\Http\Controllers;

use App\Http\Requests\Week\CreateWeekRequest;
use App\Http\Requests\Week\UpdateWeekRequest;
use App\Http\Resources\Week\WeekResource;
use App\Services\WeekService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class WeekController extends Controller
{
    protected $weekService;

    public function __construct(WeekService $weekService)
    {
        $this->weekService = $weekService;
    }

    public function index()
    {
        $weeks = $this->weekService->getAll();

        return Inertia::render('weeks/Index', [
            'weeks' => new WeekResource($weeks),
        ]);
    }

    public function show($id)
    {
        $week = $this->weekService->getById($id);

        return Inertia::render('weeks/Show', [
            'week' => new WeekResource($week),
        ]);

    }

    // API requests
    public function store(CreateWeekRequest $request)
    {

        $week = $this->weekService->create($request->validated());

        return response()->json([
            'message' => 'Week created successfully.',
            'data' => new WeekResource($week),
        ], 201);
    }


    public function update(UpdateWeekRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $newWeek = $this->weekService->update($id, $data);
        if ($newWeek) {
            return response()->json([
                'message' => 'Week updated successfully.',
                'data' => new WeekResource($newWeek),
            ], 200);
        }

        return response()->json(['message' => 'Week not found.'], 404);

    }

    public function destroy($id)
    {
        $destroyed = $this->weekService->delete($id);
        if ($destroyed) {
            return response()->json(['message' => 'Week deleted successfully.'], 200);
        }

        return response()->json(['message' => 'Week not deleted'], 404);
    }
}
