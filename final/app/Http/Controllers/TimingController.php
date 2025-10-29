<?php

namespace App\Http\Controllers;

use App\Http\Requests\Timing\CreateTimingrequest;
use App\Http\Requests\Timing\UpdateTimingRequest;
use App\Http\Resources\Timing\TimingResource;
use App\Http\Resources\Timing\TimingsResource;
use App\Models\Timing;
use App\Services\TimingService;
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
            'timings' => TimingsResource::make($this->timingService->getAllTimings()),
        ]);
    }

    public function update(UpdateTimingRequest $request)
    {
        $data = $request->validated();

        return $this->timingService->updateTiming($data);
    }

    public function store(CreateTimingrequest $request)
    {
        $timing = $this->timingService->createTiming($request->validated());

        return response()->json([
            'message' => 'Year created successfully',
            'data' => TimingResource::make($timing),
        ], 201);
    }

    public function destroy(Timing $timing)
    {
        $deleted = $this->timingService->deleteTiming($timing->id);
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
