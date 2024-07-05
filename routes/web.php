<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormFieldsController;
use App\Http\Controllers\KarigarController;
use App\Http\Controllers\OtherDetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::prefix('admin')->group(function () {
    Route::any('/login', [AdminController::class, 'loginIndex'])->name('admin.login');
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::any('/dashboard', [AdminController::class, 'dashboardIndex'])->name('admin.dashboard');
        // Form fields
        Route::any('/gender/{status?}/{id?}', [FormFieldsController::class, 'genderIndex'])->name('admin.gender');
        Route::any('/purity/{status?}/{id?}', [FormFieldsController::class, 'purityIndex'])->name('admin.purity');
        Route::any('/color/{status?}/{id?}', [FormFieldsController::class, 'colorIndex'])->name('admin.color');
        Route::any('/dandi/{status?}/{id?}', [FormFieldsController::class, 'dandiIndex'])->name('admin.dandi');
        Route::any('/gaze_size/{status?}/{id?}', [FormFieldsController::class, 'gaze_sizeIndex'])->name('admin.gaze_size');
        Route::any('/kunda/{status?}/{id?}', [FormFieldsController::class, 'kundaIndex'])->name('admin.kunda');
        Route::any('/latkan/{status?}/{id?}', [FormFieldsController::class, 'latkanIndex'])->name('admin.latkan');
        Route::any('/size/{status?}/{id?}', [FormFieldsController::class, 'sizeIndex'])->name('admin.size');
        Route::any('/weight/{status?}/{id?}', [FormFieldsController::class, 'weightIndex'])->name('admin.weight');





        // Category 
        Route::any('/category/{status?}/{id?}', [CategoryController::class, 'categoryIndex'])->name('admin.category');
        Route::any('/add_category/{id?}', [CategoryController::class, 'add_category_page'])->name('add_category');


        // Kaigar controller
        Route::any('/karigar/{status?}/{id?}', [KarigarController::class, 'karigarIndex'])->name('admin.karigar');


        // Other Details
        Route::any('/terms', [OtherDetailsController::class, 'termsIndex'])->name('admin.terms');
        Route::any('/home_banner/{stauts?}/{id?}', [OtherDetailsController::class, 'homeBannerIndex'])->name('admin.banner');
        Route::any('/about_us', [OtherDetailsController::class, 'aboutUsIndex'])->name('admin.aboutus');
        Route::any('/privacy', [OtherDetailsController::class, 'privacyIndex'])->name('admin.privacy');
    });
});



Route::post('ajaxModal/{parameter}', function (Request $request, $parameter) {
    if (View::exists($parameter)) {

        return view($parameter, ['request' => $request->all()]);
    } else {
        abort(404);
    }
});


Route::post('files/{bladePath}', function (Request $request, $bladePath) {
    if (View::exists('dropdown_files/' . $bladePath)) {
        return view('dropdown_files/' . $bladePath, ['request' => $request->all()]);
    } else {
        abort(404);
    }
});

Route::get('admin/{bladePath}', function ($bladePath) {
    if (View::exists($bladePath)) {
        return view($bladePath);
    } else {
        abort(404);
    }
});
