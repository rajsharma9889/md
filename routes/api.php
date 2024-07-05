<?php

use App\Http\Controllers\Api\CommonApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/signup', [UserApiController::class, 'singup']);
Route::post('/login', [CommonApiController::class, 'login']);