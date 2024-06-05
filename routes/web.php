<?php

use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/admin.php';

Route::get('/', \App\Http\Controllers\IndexController::class);


