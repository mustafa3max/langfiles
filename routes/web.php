<?php

use App\Http\Livewire\ControlPanel\Create;
use App\Http\Livewire\ControlPanel\Index;
use App\Http\Livewire\ControlPanel\Update;
use App\Http\Livewire\Json;
use App\Http\Livewire\Show\File;
use App\Http\Livewire\Show\Types;
use App\Http\Livewire\User\Login;
use App\Http\Livewire\User\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::scopeBindings()->group(function () {
    Route::get('types', Types::class)->name('types');
    Route::get('file', File::class)->name('file');
});

// Control Panel
Route::scopeBindings()->group(function () {
    Route::get('index/{token}', Index::class)->name('index')->middleware(['owner']);
    Route::get('create', Create::class)->name('create');
    Route::get('update', Update::class)->name('update');
});

// User
Route::scopeBindings()->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::get('json', Json::class)->name('json');
