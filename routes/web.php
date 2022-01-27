<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ProjectController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\TeamController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth','web'])->group(function () {

    Route::get('/', [DashboardController::class,'index'])->name('client.dashboard');

    Route::get('/project/{id}/{month}', [ProjectController::class, 'show'])->name('client.project.show');
    Route::get('/project/csv/{id}/{month}', [ProjectController::class, 'csvddownload'])->name('client.project.csv');
    Route::get('/project/type/{id}/{type}/{month}', [ProjectController::class, 'project_type'])->name('client.project.type');

    Route::get('team',[TeamController::class,'index'])->name('client.team');
    Route::get('team/add',[TeamController::class,'add_team'])->name('client.team.add');
    Route::post('team',[TeamController::class,'create'])->name('client.add.team');
    Route::get('team/edit/{id}',[TeamController::class,'team_edit'])->name('client.team.edit');
    Route::post('team/update',[TeamController::class,'update_team'])->name('client.update.team');
    Route::get('team/delete/{id}',[TeamController::class,'team_delete'])->name('client.team.delete');

});

