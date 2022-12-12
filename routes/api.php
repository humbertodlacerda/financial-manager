<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function() {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResources([
        'category' => CategoryController::class,
        'revenue' => RevenueController::class,
        'expense' => ExpenseController::class,
    ]);
    Route::post('auth/logout', [LoginController::class, 'logout']);
});
