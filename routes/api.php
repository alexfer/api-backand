<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "api" middleware group. Make something great!
  |
 */
use App\Http\Controllers\Api\UserController;

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', [UserController::class, 'index'])->name('api.users');
    Route::get('/user/{id}', [UserController::class, 'details'])->name('api.user.get');
});
