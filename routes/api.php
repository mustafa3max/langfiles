<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

// Types
Route::scopeBindings()->group(function () {
    // Route::post('create-tables', [TypeController::class, 'createTables']);
    // Route::post('create-files', [TypeController::class, 'createFiles']);
});
