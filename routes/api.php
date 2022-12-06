<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RevenueController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'create']);
});

Route::middleware('auth:sanctum', 'auth.session')->group(function() {
    Route::apiResources([
        'category' => CategoryController::class,
        'revenue' => RevenueController::class,
        'expense' => ExpenseController::class
    ]);
    Route::post('auth/logout', [LoginController::class, 'logout']);
});
