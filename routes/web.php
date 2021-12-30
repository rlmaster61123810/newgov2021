<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

// login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// resource sale_area
Route::get('/sale_areas', [App\Http\Controllers\SaleAreaController::class, 'index'])->name('sale_areas.index');
Route::get('/sale_areas/create', [App\Http\Controllers\SaleAreaController::class, 'create'])->name('sale_areas.create');
Route::post('/sale_areas', [App\Http\Controllers\SaleAreaController::class, 'store'])->name('sale_areas.store');
Route::get('/sale_areas/{sale_area}', [App\Http\Controllers\SaleAreaController::class, 'show'])->name('sale_areas.show');
Route::get('/sale_areas/{sale_area}/edit', [App\Http\Controllers\SaleAreaController::class, 'edit'])->name('sale_areas.edit');
Route::put('/sale_areas/{sale_area}', [App\Http\Controllers\SaleAreaController::class, 'update'])->name('sale_areas.update');
Route::delete('/sale_areas/{sale_area}', [App\Http\Controllers\SaleAreaController::class, 'destroy'])->name('sale_areas.destroy');


// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


