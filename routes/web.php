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

// redirect / to login
Route::get('/', function () {
    return redirect('login');
});

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

// login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// resource sale_area
Route::get('/sale_areas', [App\Http\Controllers\SaleAreaController::class, 'index'])->name('sale_areas.index');
Route::get('/sale_areas/create', [App\Http\Controllers\SaleAreaController::class, 'create'])->name('sale_areas.create');
Route::post('/sale_areas', [App\Http\Controllers\SaleAreaController::class, 'store'])->name('sale_areas.store');
Route::get('/sale_areas/{sale_area}', [App\Http\Controllers\SaleAreaController::class, 'show'])->name('sale_areas.show');
Route::get('/sale_areas/{sale_area}/edit', [App\Http\Controllers\SaleAreaController::class, 'edit'])->name('sale_areas.edit');
Route::put('/sale_areas/{sale_area}', [App\Http\Controllers\SaleAreaController::class, 'update'])->name('sale_areas.update');
Route::delete('/sale_areas/{sale_area}', [App\Http\Controllers\SaleAreaController::class, 'destroy'])->name('sale_areas.destroy');

// resource project
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');
// delete attachment form  <a href="{{ route('project.destroyAttachment', $project->id) }}" class="btn btn-danger btn-sm">ลบ</a>
Route::get('/projects/{project}/destroyAttachment', [App\Http\Controllers\ProjectController::class, 'destroyAttachment'])->name('projects.destroyAttachment');

// resource application
Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/create', [App\Http\Controllers\ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [App\Http\Controllers\ApplicationController::class, 'store'])->name('applications.store');
Route::get('/applications/{application}', [App\Http\Controllers\ApplicationController::class, 'show'])->name('applications.show');
Route::get('/applications/{application}/edit', [App\Http\Controllers\ApplicationController::class, 'edit'])->name('applications.edit');
Route::put('/applications/{application}', [App\Http\Controllers\ApplicationController::class, 'update'])->name('applications.update');
Route::delete('/applications/{application}', [App\Http\Controllers\ApplicationController::class, 'destroy'])->name('applications.destroy');

// resource attendee
Route::get('/attendees', [App\Http\Controllers\AttendeeController::class, 'index'])->name('attendees.index');
Route::get('/attendees/create', [App\Http\Controllers\AttendeeController::class, 'create'])->name('attendees.create');
Route::post('/attendees', [App\Http\Controllers\AttendeeController::class, 'store'])->name('attendees.store');
Route::get('/attendees/{attendee}', [App\Http\Controllers\AttendeeController::class, 'show'])->name('attendees.show');
Route::get('/attendees/{attendee}/edit', [App\Http\Controllers\AttendeeController::class, 'edit'])->name('attendees.edit');
Route::put('/attendees/{attendee}', [App\Http\Controllers\AttendeeController::class, 'update'])->name('attendees.update');
Route::delete('/attendees/{attendee}', [App\Http\Controllers\AttendeeController::class, 'destroy'])->name('attendees.destroy');

// resource community
Route::get('/communities', [App\Http\Controllers\CommunityController::class, 'index'])->name('communities.index');
Route::get('/communities/create', [App\Http\Controllers\CommunityController::class, 'create'])->name('communities.create');
Route::post('/communities', [App\Http\Controllers\CommunityController::class, 'store'])->name('communities.store');
Route::get('/communities/{community}', [App\Http\Controllers\CommunityController::class, 'show'])->name('communities.show');
Route::get('/communities/{community}/edit', [App\Http\Controllers\CommunityController::class, 'edit'])->name('communities.edit');
Route::put('/communities/{community}', [App\Http\Controllers\CommunityController::class, 'update'])->name('communities.update');
Route::delete('/communities/{community}', [App\Http\Controllers\CommunityController::class, 'destroy'])->name('communities.destroy');










// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
