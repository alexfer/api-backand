<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\Web\PageController@index')->name('page.index');
Route::get('/dashboard', 'App\Http\Controllers\Web\UserDashboardController@dashboard')->name('auth.web.dashboard');
Route::get('/login', 'App\Http\Controllers\Web\UserDashboardController@login')->name('auth.web.login');
Route::post('/logout', 'App\Http\Controllers\Web\UserDashboardController@logout')->name('auth.web.logout');
Route::post('/authenticate', 'App\Http\Controllers\Web\UserDashboardController@authenticate')->name('auth.web.authenticate');
Route::get('/register', 'App\Http\Controllers\Web\UserDashboardController@register')->name('auth.web.register');
Route::post('/store', 'App\Http\Controllers\Web\UserDashboardController@store')->name('auth.web.store');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/update', 'App\Http\Controllers\Web\ProfileController@profile')->name('profile.web.profile');
    Route::patch('/update', 'App\Http\Controllers\Web\ProfileController@update')->name('profile.web.update');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', 'App\Http\Controllers\Api\UserController@collection');
    Route::get('/user/{id}', 'App\Http\Controllers\Api\UserController@details');
});
