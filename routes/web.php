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

// resource product
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

// resource approvals
Route::get('/approvals', [App\Http\Controllers\ApprovalController::class, 'index'])->name('approvals.index');
Route::get('/approvals/create/{application_id}', [App\Http\Controllers\ApprovalController::class, 'create'])->name('approvals.create');
Route::get('/approvals/application/{application_id}/edit', [App\Http\Controllers\ApprovalController::class, 'editApplication'])->name('approvals.application.edit');
Route::put('/approvals/application/{application_id}', [App\Http\Controllers\ApprovalController::class, 'updateApplication'])->name('approvals.application.update');
Route::post('/approvals', [App\Http\Controllers\ApprovalController::class, 'store'])->name('approvals.store');
Route::get('/approvals/{approval}', [App\Http\Controllers\ApprovalController::class, 'show'])->name('approvals.show');
Route::get('/approvals/{approval}/edit', [App\Http\Controllers\ApprovalController::class, 'edit'])->name('approvals.edit');
Route::put('/approvals/{approval}', [App\Http\Controllers\ApprovalController::class, 'update'])->name('approvals.update');
Route::delete('/approvals/{approval}', [App\Http\Controllers\ApprovalController::class, 'destroy'])->name('approvals.destroy');

//attendee_details
Route::get('/attendee_details', [App\Http\Controllers\AttendeeDetailController::class, 'index'])->name('attendee_details.index');
Route::get('/attendee_details/create', [App\Http\Controllers\AttendeeDetailController::class, 'create'])->name('attendee_details.create');
Route::post('/attendee_details', [App\Http\Controllers\AttendeeDetailController::class, 'store'])->name('attendee_details.store');
Route::get('/attendee_details/{attendee_detail}', [App\Http\Controllers\AttendeeDetailController::class, 'show'])->name('attendee_details.show');
Route::get('/attendee_details/{attendee_detail}/edit', [App\Http\Controllers\AttendeeDetailController::class, 'edit'])->name('attendee_details.edit');
Route::put('/attendee_details/{attendee_detail}', [App\Http\Controllers\AttendeeDetailController::class, 'update'])->name('attendee_details.update');
Route::delete('/attendee_details/{attendee_detail}', [App\Http\Controllers\AttendeeDetailController::class, 'destroy'])->name('attendee_details.destroy');

// forms
Route::get('/forms', [App\Http\Controllers\FormController::class, 'index'])->name('forms.index');
Route::get('/forms/create', [App\Http\Controllers\FormController::class, 'create'])->name('forms.create');
Route::post('/forms', [App\Http\Controllers\FormController::class, 'store'])->name('forms.store');
Route::get('/forms/{form}', [App\Http\Controllers\FormController::class, 'show'])->name('forms.show');
Route::get('/forms/{form}/edit', [App\Http\Controllers\FormController::class, 'edit'])->name('forms.edit');
Route::put('/forms/{form}', [App\Http\Controllers\FormController::class, 'update'])->name('forms.update');
Route::delete('/forms/{form}', [App\Http\Controllers\FormController::class, 'destroy'])->name('forms.destroy');

// bills
Route::get('/bills', [App\Http\Controllers\BillController::class, 'index'])->name('bills.index');
Route::get('/bills/create', [App\Http\Controllers\BillController::class, 'create'])->name('bills.create');
Route::post('/bills', [App\Http\Controllers\BillController::class, 'store'])->name('bills.store');
Route::get('/bills/{bill}', [App\Http\Controllers\BillController::class, 'show'])->name('bills.show');
Route::get('/bills/{bill}/edit', [App\Http\Controllers\BillController::class, 'edit'])->name('bills.edit');
Route::put('/bills/{bill}', [App\Http\Controllers\BillController::class, 'update'])->name('bills.update');
Route::delete('/bills/{bill}', [App\Http\Controllers\BillController::class, 'destroy'])->name('bills.destroy');

// assign sale area to application
Route::get('/saleareas', [App\Http\Controllers\ApprovalController::class, 'saleArea'])->name('approvals.salearea');
Route::get('/assign_sale_area', [App\Http\Controllers\ApprovalController::class, 'assignSaleArea'])->name('assign_sale_area.index');
Route::get('/saleareas/edit/{approval_id}', [App\Http\Controllers\ApprovalController::class, 'editSaleArea'])->name('assign_sale_area.edit');
Route::put('/sale_area_edit/{approval_id}', [App\Http\Controllers\ApprovalController::class, 'updateSaleArea'])->name('assign_sale_area.update');
//  removeSaleArea
Route::get('/remove_sale_area/{approval_id}', [App\Http\Controllers\ApprovalController::class, 'removeSaleArea'])->name('sale-area.delete');

//downloadPDF
Route::get('/application/{application}/downloadPDF', [App\Http\Controllers\ApplicationController::class, 'downloadPDF'])->name('application.downloadPDF');







// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
