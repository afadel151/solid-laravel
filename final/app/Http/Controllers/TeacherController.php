<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\CreateTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Resources\Teacher\TeacherResource;
use App\Http\Resources\Teacher\TeacherCollection;
use App\Services\TeacherService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class TeacherController extends Controller
{
    protected $teacherService;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    // Route functions
    public function index()
    {
        return Inertia::render( 'teachers/Index', [
            'teachers' => new TeacherCollection($this->teacherService->getAll()),
        ]);
    }
    public function show($id)
    {
        $teacher = $this->teacherService->find($id);
        if (! $teacher) {
            return response()->json([
                'message' => 'Teacher not found',
            ], 404);
        }
        return Inertia::render('teachers/Show', [
            'teacher' => new TeacherResource($teacher),
        ]);
    }

    // API functions
    public function store(CreateTeacherRequest $request)
    {
        $teacher = $this->teacherService->create($request->validated());

        return response()->json([
            'message' => 'Teacher created successfully',
            'teacher' => new TeacherResource($teacher),
        ], 201);
    }

    public function update(UpdateTeacherRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $updatedTeacher = $this->teacherService->update($id, $data);

        return response()->json([
            'message' => 'Teacher updated successfully',
            'teacher' => new TeacherResource($updatedTeacher),
        ], 200);
    }

    public function destroy($id)
    {
        $destroyed = $this->teacherService->delete($id);
        if ($destroyed) {
            return response()->json([
                'success' => true], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 400);
        }
    }
    
}
