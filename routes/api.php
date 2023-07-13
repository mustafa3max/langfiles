<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

// Types
Route::scopeBindings()->group(function () {
    Route::post('types', [TypeController::class, 'types']);
    Route::post('languages', [TypeController::class, 'languages']);
    Route::post('files', [TypeController::class, 'files']);
    Route::post('file', [TypeController::class, 'file']);
});

// File
Route::scopeBindings()->group(function () {
    Route::post('create', [FileController::class, 'create']);
});
