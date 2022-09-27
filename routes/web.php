<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource(\App\Http\Controllers\RoleController::ROUTE_BASE, \App\Http\Controllers\RoleController::class);
    Route::resource(\App\Http\Controllers\DocumentTypeController::ROUTE_BASE, \App\Http\Controllers\DocumentTypeController::class);
    Route::resource(\App\Http\Controllers\UserController::ROUTE_BASE, \App\Http\Controllers\UserController::class);
    Route::get('/user/update/password', [\App\Http\Controllers\UserController::class, 'update_password'])->name('update_password');
    Route::post('/user/update/password', [\App\Http\Controllers\UserController::class, 'update_password_action'])->name('update_password_form');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/user/search/params', [\App\Http\Controllers\UserController::class, 'search'])->name('search_user');
    Route::resource(\App\Http\Controllers\CategoryEquipmentController::ROUTE_BASE, \App\Http\Controllers\CategoryEquipmentController::class);
});
