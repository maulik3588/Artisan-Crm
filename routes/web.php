<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\SmtpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

// START: Auth routes
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::get('/password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
// END: Auth routes


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\DashboardsController::class, 'index'])->name('admin.dashboard.index');

    /**
     * Customer Routes
     */
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customer/add', [App\Http\Controllers\CustomerController::class, 'add'])->name('admin.customer.add');
    Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::post('/customer/update/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('admin.customer.update');
    Route::get('/customer/delete/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('admin.customer.delete');

    /**
     * Conversation Routes
     */
    Route::get('/conversations', [App\Http\Controllers\ConversationController::class, 'index'])->name('admin.conversations.index');
    Route::get('/conversation/add', [App\Http\Controllers\ConversationController::class, 'add'])->name('admin.conversation.add');
    Route::post('/conversation/store', [App\Http\Controllers\ConversationController::class, 'store'])->name('admin.conversation.store');
    Route::get('/conversation/delete/{id}', [App\Http\Controllers\ConversationController::class, 'delete'])->name('admin.conversation.delete');

    /**
     * Conversations Routes
     */
    // Route::get('/conversations', [App\Http\Controllers\ConversationController::class, 'index'])->name('admin.conversations.index');
    // Route::get('/conversation/add', [App\Http\Controllers\ConversationController::class, 'add'])->name('admin.conversation.add');
    // Route::post('/conversation/store', [App\Http\Controllers\ConversationController::class, 'store'])->name('admin.conversation.store');
});


