<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GoalController::class, 'index'])->middleware('auth');

// Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard', 'DashboardController@index')->middleware('auth:admins');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', 'Dashboard\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Dashboard\Auth\LoginController@login')->name('login');
});

// Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
//     Route::get('login', LoginController::class, 'showLoginForm')->name('login');
//     Route::post('login', LoginController::class, 'login')->name('login');
// });

Auth::routes();
//use宣言で            ↓の部分のコード省略可
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('goals', GoalController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');

Route::resource('goals.todos', TodoController::class)->only(['store', 'update', 'destroy'])->middleware('auth');

Route::resource('tags', TagController::class)->only(['store', 'update', 'destroy'])->middleware('auth');

