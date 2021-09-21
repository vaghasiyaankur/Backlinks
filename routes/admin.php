<?php


use App\Http\Controllers\Admin\ProjectController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::namespace('Admin')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login.show');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');


    
    
    
    Route::get('/project', [ProjectController::class, 'list'])->name('admin.project.list');
    Route::get('/project/add', [ProjectController::class, 'add'])->name('admin.project.add');
    Route::post('/project/add', [ProjectController::class, 'store'])->name('admin.project.store');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');

    Route::middleware('auth:admin')->group(function () {


    });
});
