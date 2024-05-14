<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('v1/login', [AuthController::class, 'login']);
Route::post('v1/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->prefix('/v1')->group(function () {
  
  // Books
  Route::get('/books', [BookController::class, 'index']);
  Route::get('/books/{id}', [BookController::class, 'show']);
  Route::post('/books', [BookController::class, 'store']);
  Route::put('/books/{id}', [BookController::class, 'update']);  
  Route::delete('/books/{id}', [BookController::class, 'destroy']);

  // Stores
  Route::get('/stores', [StoreController::class, 'index']);
  Route::get('/stores/{id}', [StoreController::class, 'show']);
  Route::post('/stores', [StoreController::class, 'store']);
  Route::put('/stores/{id}', [StoreController::class, 'update']);
  Route::delete('/stores/{id}', [StoreController::class, 'destroy']);
});
