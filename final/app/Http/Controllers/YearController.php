<?php

namespace App\Http\Controllers;

use App\Http\Requests\Year\AddYear;
use App\Http\Requests\Year\CreateYearRequest;
use App\Http\Requests\Year\UpdateYearRequest;
use App\Http\Resources\Year\YearResource;
use App\Models\Year;
use App\Services\YearService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class YearController extends Controller
{
    protected $yearService;

    public function __construct(YearService $yearService)
    {
        $this->yearService = $yearService;
    }
    // Route requests
    public function index()
    {
        return Inertia::render("years/Index",[
            "years"=> $this->yearService->getAll()
        ]);
    }
    public function show(int $id)
    {
        return Inertia::render('years/Show', [
            'year' => new YearResource($this->yearService->find($id)),
        ]);
    }

    // API Requests
    public function all()
    {
        return new YearResource($this->yearService->getAll());
    }
    public function get(int $id)
    {
        return new YearResource($this->yearService->find($id));
    }
    public function store(CreateYearRequest $request)
    {
        $year = $this->yearService->create($request->validated());

        if ($year) {
            return response()->json([
            'message' => 'Year created successfully',
            'data' => new YearResource($year),
        ], 201);
        }
        else{
            return response()->json([
                'message'=> 'Error creating year',
            ],404);
        }
    }
    
    public function update(UpdateYearRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $year = $this->yearService->update($id, $data);
        if($year)
        {
            return response()->json([
                'message'=> 'Updated successfully',
                'data'=> new YearResource($year),
                ],200);
        }
        else{
            return response()->json([
                'message'=> 'Error updating year',
                ],404);
        }
    }
    public function destroy($id)
    {
        $destroyed = $this->yearService->delete($id);
        if($destroyed)
        {
            return response()->json([
                'message'=> 'Deleted successfully',
                ],200);

        }else{
            return response()->json([
                'message'=> 'Error deleting',
                ],404);
        }
    }
}
