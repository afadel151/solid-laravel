<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearningSession\CreateLearningSessionRequest;
use App\Http\Requests\LearningSession\LearningSessionFBARequest;
use App\Http\Requests\LearningSession\UpdateLearningSessionRequest;
use App\Http\Resources\LearningSession\LearningSessionCollection;
use App\Http\Resources\LearningSession\LearningSessionResource;
use App\Services\SessionService;
use Illuminate\Support\Arr;

class LearningSessionController extends Controller
{
    protected $sessionService;

    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function find($id)
    {
        $session = $this->sessionService->getById($id);
        if (! $session) {
            return response()->json(['message' => 'Session not found'], 404);
        }

        return response()->json([
            'session' => new LearningSessionResource($session),
        ], 200);
    }

    public function find_by_attributes(LearningSessionFBARequest $request)
    {
        $attributes = $request->validated('attributes');
        $sessions = $this->sessionService->getByAttributes($attributes);
        if (! $sessions) {
            return response()->json([
                'message' => 'Mo result'], 404);
        }

        return response()->json([
            'message' => 'Sessions Found',
            'data' => new LearningSessionCollection($sessions),
        ], 200);
    }

    public function store(CreateLearningSessionRequest $request)
    {
        $session = $this->sessionService->create($request->validated());

        if ($session) {
            return response()->json([
                'message' => 'Session created successfully',
                'data' => new LearningSessionResource($session),
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error creating session'], 404);
        }

    }

    public function update(UpdateLearningSessionRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $session = $this->sessionService->update($id, $data);
        if ($session) {
            return response()->json([
                'message' => 'Session edited sucessfully',
                'data' => new LearningSessionResource($session),
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error updating session',
            ], 404);
        }

    }

    public function destroy($id)
    {
        $destroyed = $this->sessionService->destroy($id);
        if ($destroyed) {
            return response()->json([
                'message' => 'Session Deleted successfully',
            ], 200);
        }

        return response()->json([
            'message' => 'Error deleting session',
        ], 404);
    }
}
