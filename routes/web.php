<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SelfieController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\Api\DummyApiController;
use App\Http\Controllers\LocalAddressController;
use App\Http\Controllers\PersonalInformationController;

Auth::routes();

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
});

Route::get('/search', function () {
    return view('frontend.search');
});

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::resource('/v1/dummy', DummyApiController::class, ['only' => ['index']]);
    Route::resource('/web/v1/wishlist/university', WishlistController::class);
    Route::resource('/web/v1/comment', CommentController::class);
    Route::get('/me/personal-info', [PersonalInformationController::class, 'show']);
    Route::post('/me/personal-info', [PersonalInformationController::class, 'store']);
    Route::get('/me/personal-info/edit', [PersonalInformationController::class, 'edit']);
    Route::put('/me/personal-info', [PersonalInformationController::class, 'update']);

    //local
    Route::post('/me/employee-address', [LocalAddressController::class, 'store']);
    Route::get('/me/employee-address', [LocalAddressController::class, 'show']);
    Route::put('/me/employee-address', [LocalAddressController::class, 'update']);
    Route::get('/me/employee-address/edit', [LocalAddressController::class, 'edit']);

    //selfie
    Route::get('/me/selfie', [SelfieController::class, 'show']);
    Route::post('/me/selfie', [SelfieController::class, 'store']);
    Route::get('/me/selfie/edit', [SelfieController::class, 'edit']);
    Route::put('/me/selfie', [SelfieController::class, 'update']);

    Route::get("/me/{route}", [AccountController::class, 'index']);
});

Route::resource(
    '/web/v1/universities/{country}/{major}/{tags}/all',
    UniversityController::class,
    ['only' => ['index', 'show']]
);
