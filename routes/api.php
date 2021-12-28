<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagApiController;
use App\Http\Controllers\Api\DummyApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\CountryApiController;
use App\Http\Controllers\Api\WishlistApiController;
use App\Http\Controllers\Api\UniversityApiController;
use App\Http\Controllers\Api\CourseMajorApiController;

Route::resource('/v1/countries', CountryApiController::class, ['only' => ['index', 'show']]);
Route::resource('/v1/level-of-studies', CourseMajorApiController::class, ['only' => ['index', 'show']]);
Route::resource('/v1/course-tags', TagApiController::class, ['only' => ['index', 'show']]);

// Get all universities for $country $major $tag
Route::resource(
    '/v1/universities/{country}/{major}/{tags}/all',
    UniversityApiController::class,
    ['only' => ['index', 'show']]
);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('/v1/dummy', DummyApiController::class, ['only' => ['index']]);
    Route::resource('/v1/wishlist/university', WishlistApiController::class);
    Route::resource('/v1/comment', CommentApiController::class);
});
