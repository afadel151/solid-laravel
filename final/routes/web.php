<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('years')->group(function () {
    Route::get('/',[YearController::class,'index'])->name('years.index');
});

Route::prefix('modules')->group(function () {
    Route::get('/',[ModuleController::class,'index'])->name('modules.index');
});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/api.php';