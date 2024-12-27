<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
});


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::prefix('')->group(function () {
    Route::apiResource('home', PostController::class);
});
