<?php

use App\Http\Controllers\admin\chatsController;
use App\Http\Controllers\admin\postsController;
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

Route::get('/', [App\Http\Controllers\pages\pagesController::class, 'index']);
Route::get('/politics', [App\Http\Controllers\pages\pagesController::class, 'politics']);
Route::post('/email-subscribe', [App\Http\Controllers\pages\pagesController::class, 'subscription']);
Route::get('/article/{id}', [App\Http\Controllers\pages\pagesController::class, 'article']);
Route::get('/technology', [App\Http\Controllers\pages\pagesController::class, 'technology']);
Route::get('/entertainment', [App\Http\Controllers\pages\pagesController::class, 'entertainment']);
Route::get('/travel', [App\Http\Controllers\pages\pagesController::class, 'travel']);
Route::get('/admin/dashboard', [App\Http\Controllers\admin\accountController::class, 'index'])->name('admin'); 

Route::get('/user/dashboard', [App\Http\Controllers\user\accountController::class, 'index'])->name('user');
Route::get('/admin/dashboard/all-clients', [App\Http\Controllers\admin\accountController::class, 'allclients']);
Route::get('/admin/dashboard/subscribers', [App\Http\Controllers\admin\accountController::class, 'allsubscribers']);
Route::prefix('admin')->group(function () {
    Route::resource('/dashboard/posts', postsController::class);    
    Route::resource('/dashboard/chats', chatsController::class);    
});
