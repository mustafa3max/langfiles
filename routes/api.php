<?php

use App\Http\Controllers\TypeController;
use App\Http\Livewire\Policy\Privacypolicy;
use App\Http\Livewire\Policy\Termsofservice;
use App\Http\Livewire\Show\File;
use App\Http\Livewire\Show\Keys;
use App\Http\Livewire\Show\Types;
use Illuminate\Support\Facades\Route;

// Api Admin
Route::scopeBindings()->group(function () {
    // Route::post('create-tables', [TypeController::class, 'createTables']);
    // Route::post('create-files', [TypeController::class, 'createFiles']);
    // Route::post('tables-name', [TypeController::class, 'tablesName']);
    // Route::post('create-full-table-type', [TypeController::class, 'createFullTableType']);
});

// Api App User
Route::scopeBindings()->group(function () {
    Route::scopeBindings()->group(function () {
        Route::post('types', Types::class)->name('types');
        Route::post('file/{type}', File::class)->name('file');
        Route::post('keys', Keys::class)->name('keys');
    });

    Route::scopeBindings()->group(function () {
        Route::post('privacy-policy', Privacypolicy::class)->name('privacy-policy');
        Route::post('terms-of-service', Termsofservice::class)->name('terms-of-service');
    });
});
