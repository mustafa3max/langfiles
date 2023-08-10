<?php

use App\Http\Controllers\SitemapController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Blog\Artilce;
use App\Http\Livewire\Blog\Index as BlogIndex;
use App\Http\Livewire\Blog\Create as BlogCreate;
use App\Http\Livewire\Blog\Update as BlogUpdate;
use App\Http\Livewire\Blog\Delete as BlogDelete;
use App\Http\Livewire\ControlPanel\Create;
use App\Http\Livewire\ControlPanel\Index;
use App\Http\Livewire\ControlPanel\Update;
use App\Http\Livewire\Editor\Editor;
use App\Http\Livewire\Mustafamax\Profile;
use App\Http\Livewire\Show\File;
use App\Http\Livewire\Show\Types;
use App\Http\Livewire\User\Profile as UserProfile;
use Illuminate\Support\Facades\Route;

// Sitemap
Route::scopeBindings()->group(function () {
    Route::get('/sitemap.xml',  [SitemapController::class, 'index']);
    Route::get('/sitemap.xml/types',  [SitemapController::class, 'types']);
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::scopeBindings()->group(function () {
    Route::get('types', Types::class)->name('types');
    Route::get('file/{type}', File::class)->name('file');
});

// Control Panel
Route::prefix('control-panel')->group(function () {
    // Auth
    Route::scopeBindings()->group(function () {
        Route::get('login', Login::class)->name('login');
        Route::get('register', Register::class)->name('register');
    });

    Route::middleware('auth:sanctum', 'verified')->group(function () {
        Route::get('index', Index::class)->name('index');
        Route::get('create', Create::class)->name('create');
        Route::get('update', Update::class)->name('update');
    });
});

// Mustafamax
Route::prefix('mustafamax')->group(function () {
    Route::scopeBindings()->group(function () {
        Route::get('profile', Profile::class)->name('profile');
    });

    Route::middleware('auth:sanctum', 'verified')->group(function () {
    });
});

// User
Route::prefix('user')->group(function () {
    Route::middleware('auth:sanctum', 'verified')->group(function () {
        Route::get('profile', UserProfile::class)->name('profile');
    });
});

// Blog
// Route::prefix('blog')->group(function () {
//     Route::get('/', BlogIndex::class)->name('index');
//     Route::get('article/{id}/{title}', Artilce::class);
//     Route::middleware('auth:sanctum', 'verified')->group(function () {
//         Route::get('create', BlogCreate::class)->name('create');
//         Route::get('update', BlogUpdate::class)->name('update');
//         Route::get('delete', BlogDelete::class)->name('delete');
//     });
// });

// Editor
Route::prefix('editor')->group(function () {
    Route::get('/', Editor::class)->name('editor');
});

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/valid-user/{email}', function ($email) {

//         User::where('email', $email)
//             ->update([
//                 'email_verified_at' => Carbon::now(),
//                 'owner' => true,
//             ]);
//         return redirect()->route('index');
//     });

//     Route::get('/not-valid-user/{email}', function ($email) {
//         User::where('email', $email)
//             ->update([
//                 'email_verified_at' => null,
//                 'owner' => null,
//             ]);
//         return redirect()->route('index');
//     });
// });
