<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ProjectController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Client\CreditController;
use App\Http\Controllers\Client\NetlinkingController;

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

    Route::get('/project/{id}/{month}/backlinks-data', [ProjectController::class, 'show'])->name('client.project.show');
    Route::get('/project/csv/{id}/{month}', [ProjectController::class, 'csvddownload'])->name('client.project.csv');
    Route::get('/project/type/{id}/{month}/{type}', [ProjectController::class, 'project_type'])->name('client.project.type');

    Route::get('team-data',[ProjectController::class, 'team_data'])->name('client.team.data');

    Route::get('/add/purchase',[CreditController::class, 'add_credit'])->name('client.credit.add');
    Route::get('/credit',[CreditController::class, 'index'])->name('client.credit');
    Route::post('/add/credit',[CreditController::class, 'credit_add'])->name('client.add.credit');
    Route::get('/purchase/credit',[CreditController::class, 'parchese_credit'])->name('purchase.credit');

    Route::get('/netlinking',[NetlinkingController::class, 'index'])->name('client.netlinking');

});

