<?php

namespace App\Http\Controllers;

use App\Http\Requests\Room\CreateRoomRequest;
use App\Http\Resources\Room\RoomCollection;
use App\Http\Resources\Room\RoomResource;
use App\Services\RoomService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAll();

        return Inertia::render('rooms/Index', [
            'rooms' => new RoomCollection($rooms),
        ]);
    }

    public function show($id)
    {

        $room = $this->roomService->getById($id);

        return Inertia::render('rooms/Show', [
            'room' => new RoomResource($room),
        ]);
    }


    //API requests
    public function store(CreateRoomRequest $request)
    {
        $room = $this->roomService->create($request->validated());

        return response()->json([
            'message' => 'Room created successfully',
            'room' => new RoomResource($room),
        ], 201);
    }

    public function update(CreateRoomRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $room = $this->roomService->update($id, $data);
        if ($room) {
            return response()->json([
                'message' => 'Room updated successfully',
                'room' => new RoomResource($room),
            ], 200);
        }

        return response()->json([
            'message' => 'Room not found',
        ], 404);

    }

    public function destroy($id)
    {
        $deleted = $this->roomService->delete($id);
        if ($deleted) {
            return response()->json([
                'message' => 'Room deleted successfully',
            ], 200);
        }

        return response()->json([
            'message' => 'Room not found',
        ], 404);
    }
}
