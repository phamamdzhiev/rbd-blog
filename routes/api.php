<?php

use Illuminate\Support\Facades\Route;

Route::get('/articles', [\App\Http\Controllers\API\ArticleController::class, 'index']);
