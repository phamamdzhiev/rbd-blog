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

Route::group(['middleware' => 'auth:web', 'prefix' => 'user'], function () {
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('user.logout');
    Route::post('/article/{article}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name(
        'comments.store'
    );
});




