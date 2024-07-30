<?php

use App\Http\Controllers\Api\CommonApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\KarigarApiController;
use Illuminate\Support\Facades\Route;

// Common Route
Route::post('/login', [CommonApiController::class, 'login']);
Route::post('/pages', [CommonApiController::class, 'pages']);
Route::post('/change_password', [CommonApiController::class, 'change_password']);


// ***********************************************************************************//
// Admin Auth Route
Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    Route::get('/admin/getprofile', [AdminApiController::class, 'getprofile']);
    Route::post('/admin/logout', [AdminApiController::class, 'logout']);
});
// Admin normal Route
Route::post('/check_admin', [AdminApiController::class, 'check_admin']);



// ***********************************************************************************//
// User Auth Route
Route::middleware(['auth:sanctum', 'abilities:user'])->group(function () {
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
Route::post('/user_signup', [UserApiController::class, 'singup']);
Route::post('/check_user', [UserApiController::class, 'check_user']);



// ***********************************************************************************//
// Auth Karigar Route
Route::middleware(['auth:sanctum', 'abilities:karigar'])->group(function () {
    Route::get('/karigar/getprofile', [karigarApiController::class, 'getprofile']);
    Route::post('/karigar/logout', [karigarApiController::class, 'logout']);
    Route::post('/karigar/checkCat', [karigarApiController::class, 'checkCat']);
    Route::post('/karigar/change_status', [karigarApiController::class, 'changeStatus']);
    Route::post('/karigar/get_karigar_work', [karigarApiController::class, 'getKarigarWork']);
});

// Normal Karigar Route
Route::post('/check_karigar', [karigarApiController::class, 'check_karigar']);
Route::post('/karigar_signup', [KarigarApiController::class, 'singup']);
