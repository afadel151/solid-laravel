<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\CreateGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Resources\Group\GroupCollection;
use App\Http\Resources\Group\GroupResource;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class GroupController extends Controller
{
    private GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index()
    {
        return Inertia::render('groups/Index', [
            'groups', new GroupCollection($this->groupService->getAll()),
        ]);
    }

    public function show(int $id)
    {
        return Inertia::render('groups/Show', [
            'group' => new GroupResource($this->groupService->getById($id)),
        ]);
    }


    //API requests
    public function store(CreateGroupRequest $request)
    {
        $data = $request->validated();
        $group = new GroupResource($this->groupService->create($data));

        return response()->json([
            'message' => 'Group created successfully',
            'group' => $group,
        ], 201);
    }

    public function update(UpdateGroupRequest $request)
    {
        $data = Arr::except($request->validated(), ['id']);
        $id = $request->validated('id');
        $group = new GroupResource($this->groupService->update($id, $data));

        return response()->json([
            'message' => 'Group updated successfully',
            'group' => $group,
        ], 200);
    }

    public function destroy(int $id)
    {
        $destroyed = $this->groupService->delete($id);
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
