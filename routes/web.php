<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OtherDetailsController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::any('/login', [AdminController::class, 'loginIndex'])->name('admin.login');
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::any('/dashboard', [AdminController::class, 'dashboardIndex'])->name('admin.dashboard');




        // Other Details
        Route::any('/terms', [OtherDetailsController::class, 'termsIndex'])->name('admin.terms');
        Route::any('/home_banner', [OtherDetailsController::class, 'homeBannerIndex'])->name('admin.banner');
        Route::any('/about_us', [OtherDetailsController::class, 'aboutUsIndex'])->name('admin.aboutus');
        Route::any('/privacy', [OtherDetailsController::class, 'privacyIndex'])->name('admin.privacy');
    });
});