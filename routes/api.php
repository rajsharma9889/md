<?php

use App\Http\Controllers\Api\CommonApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\AdminApiController;

use Illuminate\Support\Facades\Route;

// Admin Auth Route
Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    Route::post('/check_admin', [AdminApiController::class, 'check_admin']);
    Route::get('/admin/getprofile', [AdminApiController::class, 'getprofile']);
});

// User Auth Route
Route::middleware(['auth:sanctum', 'abilities:user'])->group(function () {
    Route::post('/check_user', [UserApiController::class, 'check_user']);
    Route::get('/user/getprofile', [UserApiController::class, 'getprofile']);
    Route::get('/dashboard', [UserApiController::class, 'dashboard']);
});




// User Normal Route
Route::post('/signup', [UserApiController::class, 'singup']);

// Common Route
Route::post('/login', [CommonApiController::class, 'login']);
Route::post('/pages', [CommonApiController::class, 'pages']);
