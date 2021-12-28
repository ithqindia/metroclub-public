<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
