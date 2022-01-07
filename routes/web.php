<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UniversityController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/search', [SearchController::class, 'index']);

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/test', function () {
    return view('frontend.test');
});

Route::get('/skeleton', function () {
    return view('frontend.skeleton');
});

Route::get('/vue2', function () {
    return view('frontend.vue2');
});

Route::get('/test2', function () {
    return view('frontend.test2');
})->middleware('verified');;

Route::get('/search', function () {
    return view('frontend.search');
});

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::resource('/v1/dummy', DummyApiController::class, ['only' => ['index']]);
    Route::resource('/web/v1/wishlist/university', WishlistController::class);
    Route::resource('/web/v1/comment', CommentController::class);
    Route::get("/me/{route}", [AccountController::class, 'index']);
});

Route::resource(
    '/web/v1/universities/{country}/{major}/{tags}/all',
    UniversityController::class,
    ['only' => ['index', 'show']]
);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return view('auth.verified');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/vf', function () {
    return view('auth.verified');
});
