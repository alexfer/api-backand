<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
 */

use App\Http\Controllers\ApiController;

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/', 'App\Http\Controllers\AdminController@index');
    $router->post('login', [ApiController::class => 'login'])->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::get('/users', [ApiController::class, 'index'])->name('users');
        Route::get('/user/{id}', [ApiController::class, 'details'])->name('user');
    });
    //$router->get('/users', [
    //    'middleware' => 'auth.basic',
    //    'uses' => 'App\Http\Controllers\AdminController@index',
    //]);
    //Route::get('users', function (Request $request) {
    //    return response()->json(['user' => $request->id]);
    //})->middleware('auth.basic');
    //$router->middleware('auth.basic')->get('/users', function (Request $request) {
    //return response()->json(['user' => $request->user()]);
    //});
});
