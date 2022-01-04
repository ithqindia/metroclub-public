<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SelfieController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RefereeDataController;
use App\Http\Controllers\EmployeeDataController;
use App\Http\Controllers\LocalAddressController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\EducationalInformationHscController;
use App\Http\Controllers\EducationalInformationSscController;
use App\Http\Controllers\EducationalInformationDiplomaController;
use App\Http\Controllers\EducationalInformationGraduationController;
use App\Http\Controllers\EducationalInformationPostgraduationController;

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

    Route::get("/me/referee", [RefereeDataController::class, 'edit']);
    Route::post("/me/referee", [RefereeDataController::class, 'store']);
    Route::put("/me/referee", [RefereeDataController::class, 'update']);


    Route::post("/me/employee", [EmployeeDataController::class, 'store']);
    Route::get("/me/employee", [EmployeeDataController::class, 'edit']);
    Route::put("/me/employee", [EmployeeDataController::class, 'update']);
    // ssc
    Route::get("/me/ssc", [EducationalInformationSscController::class, 'show']);
    Route::post("/me/ssc", [EducationalInformationSscController::class, 'store']);
    Route::get("/me/ssc/edit", [EducationalInformationSscController::class, 'edit']);
    Route::put("/me/ssc", [EducationalInformationSscController::class, 'update']);
    // hsc
    Route::get("/me/hsc", [EducationalInformationHscController::class, 'show']);
    Route::post("/me/hsc", [EducationalInformationHscController::class, 'store']);
    Route::get("/me/hsc/edit", [EducationalInformationHscController::class, 'edit']);
    Route::put("/me/hsc", [EducationalInformationHscController::class, 'update']);
    // graduation
    Route::get("/me/graduation", [EducationalInformationGraduationController::class, 'show']);
    Route::post("/me/graduation", [EducationalInformationGraduationController::class, 'store']);
    Route::get("/me/graduation/edit", [EducationalInformationGraduationController::class, 'edit']);
    Route::put("/me/graduation", [EducationalInformationGraduationController::class, 'update']);
    // diploma
    Route::get("/me/diploma", [EducationalInformationDiplomaController::class, 'show']);
    Route::post("/me/diploma", [EducationalInformationDiplomaController::class, 'store']);
    Route::get("/me/diploma/edit", [EducationalInformationDiplomaController::class, 'edit']);
    Route::put("/me/diploma", [EducationalInformationDiplomaController::class, 'update']);
    // post graduation
    Route::get("/me/post-graduation", [EducationalInformationPostgraduationController::class, 'show']);
    Route::post("/me/post-graduation", [EducationalInformationPostgraduationController::class, 'store']);
    Route::get("/me/post-graduation/edit", [EducationalInformationPostgraduationController::class, 'edit']);
    Route::put("/me/post-graduation", [EducationalInformationPostgraduationController::class, 'update']);

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
