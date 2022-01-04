<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SpotListController;
use App\Http\Controllers\Admin\Auth\LoginController;

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
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login.show');
    Route::post('/login/post', [LoginController::class,  'login'])->name('admin.login.post');


    
    
    
    
    Route::middleware('adminlogin')->group(function () {  
        
        Route::get('/dashboard', function(){
            return view('admin.welcome');
        })->name('admin.dashboard');  

        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::get('/project', [ProjectController::class, 'list'])->name('admin.project.list');
        Route::get('/project/add', [ProjectController::class, 'add'])->name('admin.project.add');
        Route::post('/project/add', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::get('/project/show/{id}/{month}', [ProjectController::class, 'show'])->name('admin.project.show');
        Route::get('/project/delete/{id}', [ProjectController::class, 'delete'])->name('admin.project.delete');
        Route::get('/project/data/add/{id}/{month}', [ProjectController::class, 'showDataMonthViseForm'])->name('admin.add.data');
        Route::get('/project/data/saved/{id}/{month}', [ProjectController::class, 'savedDataMonthVise'])->name('admin.project.saved');
        Route::post('/project/data/add', [ProjectController::class, 'addDataEntryMonthVise'])->name('admin.project.data.store');
        Route::get('/project/data/edit/{id}/{month}/{dataid}', [ProjectController::class, 'editDataMonthViseForm'])->name('admin.edit.data');
        Route::get('/project/data/delete/{id}/{month}/{dataid}', [ProjectController::class, 'deleteDataMonthViseForm'])->name('admin.delete.data');
        Route::post('/project/data/update', [ProjectController::class, 'updateDataMonthViseForm'])->name('admin.project.data.update');
        Route::post('/checkwebsite', [ProjectController::class, 'checkwebsite'])->name('admin.project.checkwebsite');
        
        //  spot list
        Route::get('/spot-list', [SpotListController::class, 'index'])->name('admin.list.spot');
        Route::get('/spot-list/add-excel', [SpotListController::class, 'excel'])->name('admin.spot.list.excel');
        Route::post('/spot-list/add-excel', [SpotListController::class, 'excelstore'])->name('admin.spot.excel.store');
        Route::get('/spot-list/download-csv', [SpotListController::class, 'csvdownload'])->name('admin.spot.list.csv');
        Route::post('/spot-list/spotlist-filter', [SpotListController::class, 'filters'])->name('admin.spotlist.filters');


        
        
        
        
    });
});
