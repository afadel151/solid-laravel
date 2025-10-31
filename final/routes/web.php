<?php

use App\Http\Controllers\GlobalWeekController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimingController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('global_weeks')->group(function () {
    Route::get('/', [GlobalWeekController::class, 'index'])->name('global_weeks.index');
    Route::get('/{id}', [GlobalWeekController::class, 'show'])->name('global_weeks.show');
});
Route::prefix('weeks')->group(function () {
    Route::get('/', [WeekController::class, 'index'])->name('weeks.index');
    Route::get('/{id}',[WeekController::class,'show'])->name('weeks.show');
});
Route::prefix('years')->group(function () {
    Route::get('/', [YearController::class, 'index'])->name('years.index');
    Route::get('/{id}',[YearController::class,'show'])->name('years.show');
});

Route::prefix('sectors')->group(function () {
    Route::get('/', [SectorController::class, 'index'])->name('sectors.index');
    Route::get('/{id}',[SectorController::class,'show'])->name('sectors.show');
});

Route::prefix('sections')->group(function () {
    Route::get('/', [SectionController::class, 'index'])->name('sections.index');
    Route::get('/{id}',[SectionController::class,'show'])->name('sections.show');
});

Route::prefix('groups')->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/{id}',[GroupController::class,'show'])->name('groups.show');
});
Route::prefix('rooms')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/{id}',[RoomController::class,'show'])->name('rooms.show');
});
Route::prefix('timings')->group(function () {
    Route::get('/', [TimingController::class, 'index'])->name('timings.index');
});

Route::prefix('modules')->group(function () {
    Route::get('/', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/{id}', [ModuleController::class, 'show'])->name('modules.show');
});
Route::prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/{id}',[TeacherController::class,'show'])->name('teachers.show');
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/api.php';
