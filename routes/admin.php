<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Admin\AdminController::class, 'loginIndex'])->name('admin.login');
        Route::post('/login', [\App\Http\Controllers\Admin\AdminController::class, 'login']);
    });

    // * Articles

    Route::middleware('auth:admin')->group(function () {
        Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
        Route::get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
    });
});
