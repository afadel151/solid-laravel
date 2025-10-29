<?php

namespace App\Http\Controllers;

use App\Http\Requests\Year\AddYear;
use App\Http\Resources\Year\YearResource;
use App\Models\Year;
use App\Services\YearService;
use Illuminate\Database\Eloquent\Collection;
use Inertia\Inertia;

class YearController extends Controller
{
    protected $yearService;

    public function __construct(YearService $yearService)
    {
        $this->yearService = $yearService;
    }

    public function index(): Collection
    {
        return $this->yearService->getAllYears();
    }

    public function store(AddYear $request)
    {
        $year = $this->yearService->createYear($request->validated());

        return response()->json([
            'message' => 'Year created successfully',
            'data' => YearResource::make($year),
        ], 201);
    }

    public function show(Year $year)
    {
        return Inertia::render('years/Show', [
            'year' => new YearResource($year),
        ]);
    }
}
