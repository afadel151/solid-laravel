<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;


Route::prefix('/api')->group(function () {
    Route::prefix('/modules')->group(function(){
        Route::get('/',[ModuleController::class,'get_all'])->name('api.modules.get_all');
    });
});