<?php

use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/admin.php';

Route::get('/', \App\Http\Controllers\BlogController::class)->name('homepage');
Route::get('/blog/article/{article}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.article');

Route::group(['middleware' => 'guest', 'prefix' => 'user'], function () {
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginIndex'])->name('user.login');
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'registerIndex'])->name('user.register');

    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
});

Route::get('/user/logout', [\App\Http\Controllers\UserController::class, 'logout'])
    ->middleware('auth:web')
    ->name('user.logout');

