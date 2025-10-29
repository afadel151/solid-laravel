<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\CreateSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use App\Services\SectionService;
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
            'sections' => SectionResource::make($this->sectionService->getAll()),
        ]);
    }

    public function show(Section $section)
    {
        return Inertia::render('sections/Show', [
            'section' => SectionResource::make($this->sectionService->getById($section->id)),
        ]);
    }

    public function store(CreateSectionRequest $request)
    {
        $section = $this->sectionService->store($request->validated());
        if ($section) {
            return response()->json([
                'success' => true,
                'data' => SectionResource::make($section),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 400);
        }
    }

    public function update(UpdateSectionRequest $request)
    {
        $section = $this->sectionService->update($request->validated());
        if ($section) {
            return response()->json([
                'success' => true,
                'data' => SectionResource::make($section),
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
