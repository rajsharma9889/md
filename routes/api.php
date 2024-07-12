<?php

use App\Http\Controllers\Api\CommonApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\AdminApiController;
use Illuminate\Support\Facades\Route;

// Admin Auth Route
Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    Route::post('/check_admin', [AdminApiController::class, 'check_admin']);
    Route::get('/admin/getprofile', [AdminApiController::class, 'getprofile']);
    Route::post('/admin/logout', [AdminApiController::class, 'logout']);
});

// User Auth Route
Route::middleware(['auth:sanctum', 'abilities:user'])->group(function () {
    Route::post('/check_user', [UserApiController::class, 'check_user']);
    Route::get('/user/getprofile', [UserApiController::class, 'getprofile']);
    Route::get('/dashboard', [UserApiController::class, 'dashboard']);
    Route::post('/user/logout', [UserApiController::class, 'logout']);
    Route::get('/user/getCategory', [UserApiController::class, 'getCategory']);


    // form fields
    Route::get('/purity', [UserApiController::class, 'purity']);
    Route::get('/color', [UserApiController::class, 'color']);
    Route::get('/dandi', [UserApiController::class, 'dandi']);
    Route::get('/kunda', [UserApiController::class, 'kunda']);
    Route::get('/size', [UserApiController::class, 'size']);
    Route::get('/gaze_size', [UserApiController::class, 'gaze_size']);
    Route::get('/weight', [UserApiController::class, 'weight']);
    Route::get('/latkan', [UserApiController::class, 'latkan']);

    // form Submited
    Route::post('/formsubmit', [UserApiController::class, 'formSubmit']);
    Route::post('/checkCat', [UserApiController::class, 'checkCat']);
});




// User Normal Route
Route::post('/signup', [UserApiController::class, 'singup']);




// Common Route
Route::post('/login', [CommonApiController::class, 'login']);
Route::post('/pages', [CommonApiController::class, 'pages']);
Route::post('/change_password', [CommonApiController::class, 'change_password']);
