<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\CreateSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Http\Resources\Section\SectionCollection;
use App\Http\Resources\Section\SectionResource;
use App\Models\Section;
use App\Services\SectionService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class SectionController extends Controller
{
    protected $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index()
    {
        return Inertia::render('sections/Index', [
            'sections' => new SectionCollection($this->sectionService->getAll()),
        ]);
    }

    public function show(int $id)
    {
        return Inertia::render('sections/Show', [
            'section' => new SectionResource($this->sectionService->getById($id)),
        ]);
    }


    //API requests
    public function store(CreateSectionRequest $request)
    {
        $section = $this->sectionService->store($request->validated());
        if ($section) {
            return response()->json([
                'success' => true,
                'data' => new SectionResource($section),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 400);
        }
    }

    public function update(UpdateSectionRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $section = $this->sectionService->update($id, $data);
        if ($section) {
            return response()->json([
                'success' => true,
                'data' => new SectionResource($section),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 400);
        }
    }

    public function destroy($id)
    {
        $destroyed = $this->sectionService->delete($id);
        if ($destroyed) {
            return response()->json([
                'success' => true], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 404);
        }

    }
}
