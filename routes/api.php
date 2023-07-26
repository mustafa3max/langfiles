<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

// Types
Route::scopeBindings()->group(function () {
    Route::post('create-tables', [TypeController::class, 'createTables']);
    Route::post('create-files', [TypeController::class, 'createFiles']);
    Route::post('tables-name', [TypeController::class, 'tablesName']);

    //
    Route::post('create-full-table-type', [TypeController::class, 'createFullTableType']);
});

Route::get('sitemap', function () {
    return SitemapGenerator::create('localhost:8000')->writeToFile(public_path('sitemap.xml'));
});
