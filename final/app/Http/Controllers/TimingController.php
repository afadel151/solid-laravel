<?php

namespace App\Http\Controllers;

use App\Http\Requests\Timing\CreateTimingrequest;
use App\Http\Requests\Timing\UpdateTimingRequest;
use App\Http\Resources\Timing\TimingCollection;
use App\Http\Resources\Timing\TimingResource;
use App\Services\TimingService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class TimingController extends Controller
{
    //
    protected $timingService;

    public function __construct(TimingService $timingService)
    {
        $this->timingService = $timingService;
    }

    public function index()
    {
        return Inertia::render('timings/Index', [
            'timings' => new TimingCollection($this->timingService->getAll()),
        ]);
    }

    public function update(UpdateTimingRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);

        $updated = $this->timingService->update($id, $data);
        if ($updated) {
            return response()->json([
                'message' => 'Updated successfullt',
                'timing' => new TimingResource($updated),
            ], 200);
        } else {
            return response()->json([
                'messae' => 'failed to update timing',
            ], 404);
        }
    }

    public function store(CreateTimingrequest $request)
    {
        $timing = $this->timingService->create($request->validated());

        return response()->json([
            'message' => 'Year created successfully',
            'data' => new TimingResource($timing),
        ], 201);
    }

    public function destroy($id)
    {
        $deleted = $this->timingService->delete($id);
        if ($deleted) {
            return response()->json([
                'message' => 'Timing deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Timing deletion failed',
            ], 400);
        }
    }
}
