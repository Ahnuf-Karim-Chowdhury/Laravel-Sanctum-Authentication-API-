<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* Route::get('/home', [PostController::class, 'index']);
Route::post('/home', [PostController::class, 'store']);
Route::get('/home/{id}', [PostController::class, 'show']);
Route::put('/home/{id}', [PostController::class, 'update']);
Route::delete('/home/{id}', [PostController::class, 'destroy']); 

Route::prefix('home/')->group(function () {
    Route::apiResource('posts', PostController::class);
    
});

*/

// use this to make sure the route list is correct : php artisan route:list

Route::prefix('')->group(function () {
    Route::apiResource('home', PostController::class);
});



