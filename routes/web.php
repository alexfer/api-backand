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

use App\Http\Controllers\AdminController;

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/', 'IndexController@index');

    Route::group(['middleware' => ['auth.basic']], function () {
        Route::get('/users', [AdminController::class, 'index'])->name('users');
        Route::get('/user/{id}', [AdminController::class, 'details'])->name('user');
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
