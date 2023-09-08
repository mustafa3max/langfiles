<?php

use App\Http\Controllers\SitemapController;
use App\Http\Globals;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Blog\Artilce;
use App\Livewire\Blog\Index as BlogIndex;
use App\Livewire\Blog\Create as BlogCreate;
use App\Livewire\Blog\Update as BlogUpdate;
use App\Livewire\Blog\Delete as BlogDelete;
use App\Livewire\Contributors\Index as ContributorsIndex;
use App\Livewire\ControlPanel\Create;
use App\Livewire\ControlPanel\Index;
use App\Livewire\ControlPanel\Update;
use App\Livewire\Convert\To;
use App\Livewire\Editor\Editor;
use App\Livewire\Mustafamax\Profile;
use App\Livewire\Policy\Privacypolicy;
use App\Livewire\Policy\Termsofservice;
use App\Livewire\Show\File;
use App\Livewire\Show\Keys;
use App\Livewire\Show\Types;
use App\Livewire\User\AddText;
use App\Livewire\User\Profile as UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;

// Sitemap
Route::scopeBindings()->group(function () {
    Route::get('/sitemap.xml',  [SitemapController::class, 'index']);
    Route::get('/sitemap.xml/types',  [SitemapController::class, 'types']);
});

Route::get('/', function () {
    return view('index');
});

Route::scopeBindings()->group(function () {
    Route::get('types', Types::class)->name('types');
    Route::get('file/{type}', File::class);
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

// Auth
Route::scopeBindings()->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
});

// Control Panel
Route::prefix('control-panel')->group(function () {
    Route::middleware('auth:sanctum', 'verified')->group(function () {
        Route::get('index', Index::class);
        Route::get('create', Create::class);
        Route::get('update', Update::class);
    });
});

// Mustafamax
Route::prefix('mustafamax')->group(function () {
    Route::get('profile', Profile::class);

    Route::middleware('auth:sanctum', 'verified')->group(function () {
    });
});

// User
Route::prefix('user')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('add-text', AddText::class)->name('add-text');
        Route::get('profile', UserProfile::class);
        Route::get('logout', function () {
            return Globals::logout();
        });
    });
    Route::middleware('auth:sanctum', 'verified')->group(function () {
    });
});

// Contributors
Route::prefix('contributors')->group(function () {
    Route::get('/', ContributorsIndex::class)->name('contributors');
});


// Blog
// Route::prefix('blog')->group(function () {
//     Route::get('/', BlogIndex::class);
//     Route::get('article/{id}/{title}', Artilce::class);
//     Route::get('create', BlogCreate::class);
//     Route::prefix('editor')->group(function () {
//         Route::get('/', Editor::class);
//     });
//     Route::middleware('auth:sanctum', 'verified')->group(function () {
//         Route::get('update', BlogUpdate::class);
//         Route::get('delete', BlogDelete::class);
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

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/custom/livewire/update', $handle);
});
