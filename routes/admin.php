<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SpotListController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\CurrentOrderController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OldClientController;
use App\Http\Controllers\Admin\SalesController;
use Illuminate\Routing\Route as RoutingRoute;

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

        // user

        Route::get('users', [UserController::class, 'index'])->name('admin.user');
        Route::get('changePassword/{id}/{user}', function($id,$user){
            return view('admin.users.change_password',compact('id','user'));
        })->name('change.password');
        Route::post('changePassword',[UserController::class,'changePassword'])->name('admin.user.change.password');
        Route::get('user/add', function(){
            return view('admin.users.add_user');
        })->name('add.users');
        Route::post('user/add',[UserController::class,'add_user'])->name('admin.user.store');
        Route::get('user/edit/{id}/{user}',[UserController::class,'edit_user'])->name('user.edit');
        Route::post('user/update',[UserController::class,'update_user'])->name('admin.user.update');

        // project

        Route::get('/project', [ProjectController::class, 'list'])->name('admin.project.list');
        Route::get('/project/add', [ProjectController::class, 'add'])->name('admin.project.add');
        Route::post('/project/add', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::post('/project/update/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::get('/project/show/{id}/{month}', [ProjectController::class, 'show'])->name('admin.project.show');
        Route::get('/project/delete/{id}', [ProjectController::class, 'delete'])->name('admin.project.delete');
        Route::get('/project/data/add/{id}/{month}', [ProjectController::class, 'showDataMonthViseForm'])->name('admin.add.data');
        Route::get('/project/data/saved/{id}/{month}', [ProjectController::class, 'savedDataMonthVise'])->name('admin.project.saved');
        Route::post('/project/data/add', [ProjectController::class, 'addDataEntryMonthVise'])->name('admin.project.data.store');
        Route::get('/project/data/edit/{id}/{month}/{dataid}', [ProjectController::class, 'editDataMonthViseForm'])->name('admin.edit.data');
        Route::get('/project/data/delete/{id}/{month}/{dataid}', [ProjectController::class, 'deleteDataMonthViseForm'])->name('admin.delete.data');
        Route::get('/project/data/show/{id}/{month}/{dataid}', [ProjectController::class, 'showDetailDataMonthViseForm'])->name('admin.show.data');
        Route::post('/project/data/update', [ProjectController::class, 'updateDataMonthViseForm'])->name('admin.project.data.update');
        Route::post('/checkwebsite', [ProjectController::class, 'checkwebsite'])->name('admin.project.checkwebsite');
        Route::post('/project/show/filter', [ProjectController::class, 'filter'])->name('admin.project.show.filters');
        Route::post('/project/show/spot-url', [ProjectController::class, 'spot_url_update'])->name('admin.project.show.url-spot');
        Route::get('/project/type/{id}/{month}',[ProjectController::class, 'show_project_type'])->name('admin.project.show.dashboard');
        Route::get('/project/dropify/{id}/{type}/{month}',[ProjectController::class,'dropify_view'])->name('admin.project.dropify');
        Route::post('/project/dropify',[ProjectController::class,'project_dropify'])->name('admin.project.dropify.store');
        Route::get('/project/status/{id}',[ProjectController::class,'project_status'])->name('admin.project.status');
        Route::get('/dropify/delete/{id}',[ProjectController::class,'dropify_delete'])->name('dropify.delete');
        Route::get('/project/validate/{id}/{month}/{valid_id}',[ProjectController::class,'check_valid_data'])->name('admin.show.validate');
        Route::get('/project/data/deliver/{id}/{month}',[ProjectController::class,'deliverDataMonthVise'])->name('admin.project.deliver');

        //  spot list
        Route::get('/spot-list', [SpotListController::class, 'index'])->name('admin.list.spot');
        Route::get('/spot-list-edit/{id}', [SpotListController::class, 'edit'])->name('admin.list.edit');
        Route::get('/spot-list-delete/{id}', [SpotListController::class, 'delete'])->name('admin.list.delete');
        Route::post('/spot-list-update/{id}', [SpotListController::class, 'update'])->name('admin.list.update');
        Route::get('/spot-list/add-excel', [SpotListController::class, 'excel'])->name('admin.spot.list.excel');
        Route::post('/spot-list/add-excel', [SpotListController::class, 'excelstore'])->name('admin.spot.excel.store');
        Route::get('/spot-list/download-csv', [SpotListController::class, 'csvdownload'])->name('admin.spot.list.csv');
        Route::post('/spot-list/spotlist-filter', [SpotListController::class, 'filters'])->name('admin.spotlist.filters');
        Route::get('/spot-list-demo', [SpotListController::class, 'exceldemo'])->name('admin.list.demo');
        Route::view('/spot-list/update-data', 'admin.spotlist.update-data')->name('admin.spot.list.update.data');
        Route::get('/spot-list/excel', [SpotListController::class, 'exceldownload'])->name('admin.list.spotlist.excel');
        Route::post('/spot-list/store-csv', [SpotListController::class, 'storeexcel'])->name('admin.spotlist.excel.store');


        // gantt chart
        Route::get('/chart', [ChartController::class, 'index'])->name('admin.chart.list');
        Route::post('/chart/change-color', [ChartController::class, 'changecolor'])->name('admin.chart.changecolor');


        //  curretn BL Order
        Route::get('/currentorder', [CurrentOrderController::class, 'index'])->name('admin.current.order');
        Route::post('/currentorder/filter', [CurrentOrderController::class, 'filter'])->name('admin.current.order.filters');
        Route::post('/currentorder/download-csv',[CurrentOrderController::class, 'download_csv'])->name('admin.currentorder.csv');

        Route::get('/old-project', [OldClientController::class, 'index'])->name('admin.old.client');

        Route::view('diagnostic','admin.sales.index')->name('admin.diagnostic');
        Route::post('diagnostic',[SalesController::class,'index'])->name('admin.api.call');
        Route::view('dictionnaire','admin.sales.dictionnaire')->name('admin.dictionnaire');
    });
});
