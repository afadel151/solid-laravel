<?php

namespace App\Http\Controllers;

use App\Services\ModuleService;
use Inertia\Inertia;

class ModuleController extends Controller
{
    protected $moduleSvc;
    public function __construct(ModuleService $module_service)
    {
        $this->moduleSvc = $module_service;
    }
    public function get_all(){

        return response()->json($this->moduleSvc->all());
    }
    public function index(){
        return Inertia::render("modules/Index",[
            'modules'=> $this->moduleSvc->all()
        ]);
    }
}
