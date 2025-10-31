<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sector\CreateSectorRequest;
use App\Http\Requests\Sector\UpdateSectorRequest;
use App\Http\Resources\SectorResource;
use App\Models\Sector;
use App\Services\SectorService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class SectorController extends Controller
{
    protected $sectorService;

    public function __construct(SectorService $sectorService)
    {
        $this->sectorService = $sectorService;
    }

    public function index()
    {
        return Inertia::render('sectors/Index', [
            'sectors' => SectorResource::make($this->sectorService->getAll()),
        ]);
    }

    public function show(Sector $sector)
    {
        return Inertia::render('sectors/Show', [
            'sector' => SectorResource::make($sector),
        ]);
    }

    public function store(CreateSectorRequest $request)
    {
        $sector = $this->sectorService->create($request->validated());

        return response()->json([
            'message' => 'Sector created successfully',
            'data' => SectorResource::make($sector),
        ], 201);
    }

    public function update(UpdateSectorRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $sector = $this->sectorService->update($id, $data);

        if ($sector) {
            return response()->json([
                'message' => 'Sector updated successfully',
                'data' => SectorResource::make($sector),
            ], 200);
        }else{
            return response()->json([
                    'message'=> 'Error updating',
            ],404);
        }
    }

    public function destory($id)
    {
        $deleted = $this->sectorService->delete($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Sector could not be deleted',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sector deleted successfully',
        ]);

    }
}
