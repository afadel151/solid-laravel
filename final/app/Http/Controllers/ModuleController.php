<?php

namespace App\Http\Controllers;

use App\Http\Requests\Module\StoreModuleRequest;
use App\Http\Requests\Module\UpdateModuleRequest;
use App\Http\Resources\Module\ModuleCollection;
use App\Http\Resources\Module\ModuleResource;
use App\Models\Module;
use App\Services\ModuleService;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class ModuleController extends Controller
{
    protected $moduleSvc;

    public function __construct(ModuleService $module_service)
    {
        $this->moduleSvc = $module_service;
    }

    public function get_all()
    {

        return response()->json(new ModuleCollection($this->moduleSvc->all()));
    }

    public function index()
    {
        return Inertia::render('modules/Index', [
            'modules' => new ModuleCollection($this->moduleSvc->all()),
        ]);
    }

    public function store(StoreModuleRequest $request)
    {
        $module = $this->moduleSvc->create($request->validated());

        return response()->json([
            'message' => 'Module created successfully',
            'module' => new ModuleResource($module),
        ], 201);
    }

    public function update(UpdateModuleRequest $request)
    {
        $id = $request->validated('id');
        $data = Arr::except($request->validated(), ['id']);
        $module = $this->moduleSvc->update($id, $data);

        return response()->json([
            'message' => 'Module updated successfully',
            'module' => new ModuleResource($module),
        ], 200);
    }

    public function destroy(Module $module)
    {
        $destroyed = $this->moduleSvc->delete($module->id);
        if (! $destroyed) {
            return response()->json([
                'message' => 'Module not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Module deleted successfully',
        ], 200);
    }
}
