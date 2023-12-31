<?php

use App\Http\Controllers\SitemapController;
use App\Http\Globals;
use App\Livewire\Auth\SignIn;
use App\Livewire\Auth\SignUp;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Blog\Artilce;
use App\Livewire\Blog\Index as BlogIndex;
use App\Livewire\Blog\Create as BlogCreate;
use App\Livewire\Blog\Update as BlogUpdate;
use App\Livewire\Blog\Delete as BlogDelete;
use App\Livewire\Contributors\Index as ContributorsIndex;
use App\Livewire\ControlPanel\Create;
use App\Livewire\ControlPanel\Index;
use App\Livewire\ControlPanel\Update;
use App\Livewire\Convert\Client;
use App\Livewire\Convert\To;
use App\Livewire\Help\CallUs;
use App\Livewire\Mustafamax\Profile;
use App\Livewire\Policy\Privacypolicy;
use App\Livewire\Policy\Termsofservice;
use App\Livewire\Show\File;
use App\Livewire\Show\Types;
use App\Livewire\Test;
use App\Livewire\Tools\Index as ToolsIndex;
use App\Livewire\Tools\LangTool;
use App\Livewire\Tools\LangToolFlutter;
use App\Livewire\Tools\LangtoolLaravel;
use App\Livewire\User\AddText;
use App\Livewire\User\Delete;
use App\Livewire\User\Profile as UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;

// Route::get('/notification', function () {
//     $invoice = User::find(1);

//     return (new MailMessage)
//         ->subject(__('email.subject'))
//         ->line(__('email.line'))
//         ->action(__('email.action'), 'url');
// });

// Sitemap
Route::scopeBindings()->group(function () {
    Route::get('/sitemap.xml',  [SitemapController::class, 'index']);
    Route::get('/sitemap.xml/types',  [SitemapController::class, 'types']);
    Route::get('/sitemap.xml/blogs',  [SitemapController::class, 'blogs']);
    Route::get('/sitemap.xml/tools',  [SitemapController::class, 'tools']);
});

// Email Verify
Route::scopeBindings()->group(function () {
    Route::get('/email/verify', VerifyEmail::class)->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('types');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::scopeBindings()->group(function () {
    Route::get('types', Types::class)->name('types');
    Route::get('file/{type}', File::class);
});

// Policy
Route::scopeBindings()->group(function () {
    Route::get('privacy-policy', Privacypolicy::class)->name('privacy-policy');
    Route::get('terms-of-service', Termsofservice::class)->name('terms-of-service');
});

// Convert To
Route::scopeBindings()->group(function () {
    Route::get('convert/json-to-more', To::class)->name('convert-to');
    Route::get('convert/client', Client::class);
});

// Auth
Route::scopeBindings()->group(function () {
    Route::get('sign-in', SignIn::class)->name('sign-in');
    Route::get('sign-up', SignUp::class);
});

// Mustafamax
Route::prefix('mustafamax')->group(function () {
    Route::get('profile', Profile::class);
});

// User
Route::prefix('user')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('profile', UserProfile::class);
        Route::get('logout', function () {
            return Globals::logout();
        })->name('logout');
        Route::get('add-text', AddText::class)->name('add-text');
    });
    Route::middleware('auth:sanctum', 'verified')->group(function () {
        Route::get('delete-account', Delete::class)->name('delete-account');
    });
});

// Contributors
Route::prefix('contributors')->group(function () {
    Route::get('/', ContributorsIndex::class)->name('contributors');
});


// Blog
Route::prefix('blog')->group(function () {
    Route::get('/', BlogIndex::class)->name('blog');
    Route::get('article/{path}', Artilce::class);

    Route::middleware('auth:sanctum', 'verified', 'owner')->group(function () {
        Route::get('create', BlogCreate::class)->name('create');

        Route::get('update', BlogUpdate::class);
        Route::get('delete', BlogDelete::class);
    });
});

// Help
Route::scopeBindings()->group(function () {
    Route::get('/call-us', CallUs::class)->name('call_us');
});

// Tools
Route::prefix('tools')->group(function () {
    Route::get('/langfiles', ToolsIndex::class)->name('langfiles-tolls');
    Route::get('/langtool-flutter', LangToolFlutter::class)->name('langtool-flutter');
    Route::get('/langtool-laravel', LangtoolLaravel::class)->name('langtool-laravel');
});

// Route::get('/test', Test::class)->name('test');


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
