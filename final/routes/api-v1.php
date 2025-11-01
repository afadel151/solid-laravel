<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalWeekController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LearningSessionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimingController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\YearController;
use App\Models\GlobalWeek;

Route::prefix('/')->group(function () {
    Route::prefix('global_weeks')->group(function () 
    {
        Route::post('/create',[GlobalWeekController::class,'store']);
        Route::post('/update',[GlobalWeekController::class,'update']);
        Route::delete('/destroy/{id}',[GlobalWeekController::class,'destroy']);

    });
    Route::prefix('weeks')->group(function () 
    {
        Route::post('/create',[WeekController::class,'store']);
        Route::post('/update',[WeekController::class,'update']);
        Route::delete('/destroy/{id}',[WeekController::class,'destroy']);
    });
    Route::prefix('years')->group(function () 
    {
       Route::post('/create',[YearController::class,'store']);
        Route::post('/update',[YearController::class,'update']);
        Route::delete('/destroy/{id}',[YearController::class,'destroy']);
    });

    Route::prefix('sectors')->group(function () 
    {
       Route::post('/create',[SectorController::class,'store']);
        Route::post('/update',[SectorController::class,'update']);
        Route::delete('/destroy/{id}',[SectorController::class,'destroy']);
    });

    Route::prefix('sections')->group(function () 
    {
       Route::post('/create',[SectorController::class,'store']);
        Route::post('/update',[SectorController::class,'update']);
        Route::delete('/destroy/{id}',[SectorController::class,'destroy']);
    });

    Route::prefix('groups')->group(function () 
    {
       Route::post('/create',[GroupController::class,'store']);
        Route::post('/update',[GroupController::class,'update']);
        Route::delete('/destroy/{id}',[GroupController::class,'destroy']);
    });
    Route::prefix('rooms')->group(function () 
    {
       Route::post('/create',[RoomController::class,'store']);
        Route::post('/update',[RoomController::class,'update']);
        Route::delete('/destroy/{id}',[RoomController::class,'destroy']);
    });
    Route::prefix('timings')->group(function () 
    {
       Route::post('/create',[TimingController::class,'store']);
        Route::post('/update',[TimingController::class,'update']);
        Route::delete('/destroy/{id}',[TimingController::class,'destroy']);
    });
    Route::prefix('modules')->group(function () 
    {
       Route::post('/create',[ModuleController::class,'store']);
        Route::post('/update',[ModuleController::class,'update']);
        Route::delete('/destroy/{id}',[ModuleController::class,'destroy']);
    });
    Route::prefix('teachers')->group(function () 
    {
       Route::post('/create',[TeacherController::class,'store']);
        Route::post('/update',[TeacherController::class,'update']);
        Route::delete('/destroy/{id}',[TeacherController::class,'destroy']);
    });
    Route::prefix('sessions')->group(function () 
    {
        Route::post('/create',[LearningSessionController::class,'store']);
        Route::get('/{id}',[LearningSessionController::class,'find']);
        Route::get('/find_by_attributes',[LearningSessionController::class,'find_by_attributes']);
        Route::post('/update',[LearningSessionController::class,'update']);
        Route::delete('/destroy/{id}',[LearningSessionController::class,'destroy']);
    });
})->middleware('auth:sanctum');

