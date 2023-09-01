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
use App\Http\Livewire\Convert\To;
use App\Http\Livewire\Editor\Editor;
use App\Http\Livewire\Mustafamax\Profile;
use App\Http\Livewire\Policy\Privacypolicy;
use App\Http\Livewire\Policy\Termsofservice;
use App\Http\Livewire\Show\File;
use App\Http\Livewire\Show\Keys;
use App\Http\Livewire\Show\Types;
use App\Http\Livewire\User\AddText;
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
    Route::get('keys', Keys::class)->name('keys');
});

// Policy
Route::scopeBindings()->group(function () {
    Route::get('privacy-policy', Privacypolicy::class)->name('privacy-policy');
    Route::get('terms-of-service', Termsofservice::class)->name('terms-of-service');
});

// Convert To
Route::scopeBindings()->group(function () {
    Route::get('convert/json-to-more', To::class)->name('convert-to');
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
    Route::get('add-text', AddText::class)->name('add-text');
    Route::middleware('auth:sanctum', 'verified')->group(function () {
        Route::get('profile', UserProfile::class)->name('profile');
    });
});

// Blog
// Route::prefix('blog')->group(function () {
//     Route::get('/', BlogIndex::class)->name('index');
//     Route::get('article/{id}/{title}', Artilce::class);
//     Route::get('create', BlogCreate::class)->name('create');
//     Route::prefix('editor')->group(function () {
//         Route::get('/', Editor::class)->name('editor');
//     });
//     Route::middleware('auth:sanctum', 'verified')->group(function () {
//         Route::get('update', BlogUpdate::class)->name('update');
//         Route::get('delete', BlogDelete::class)->name('delete');
//     });
// });

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
