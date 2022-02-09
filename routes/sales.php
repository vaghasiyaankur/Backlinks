<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sales\Auth\AuthController;
use App\Http\Controllers\Sales\DiagnosticController;

Route::namespace('Sales')->group(function () {

    Route::view('/login', 'sales.auth.login')->name('sales.login.show');
    Route::view('register','sales.auth.register')->name('sales.register.show');
    Route::post('register',[AuthController::class, 'register_sales'])->name('register.sales');
    Route::post('login',[AuthController::class,'login_sales'])->name('sales.login');
    Route::view('forget-password','sales.auth.forgetPassword')->name('sales.forget.password.get');
    Route::post('forget-password',[AuthController::class, 'forget_pass'])->name('sales.forget.password.post');
    Route::view('reset-password','sales.auth.forgetPasswordLink')->name('sales.reset.password.get');
    Route::post('reset-password',[AuthController::class, 'reset_pass'])->name('sales.reset.password.post');

    Route::middleware('saleslogin')->group(function (){
        Route::view('/dashboard', 'sales.welcome')->name('sales.dashboard');

        Route::view('dictionnaire','sales.dictionnaire.index')->name('sales.dictionnaire');
        Route::post('logout',[AuthController::class, 'logout'])->name('sales.logout');

        Route::view('diagnostic','sales.diagnostic.index')->name('sales.diagostic');
        Route::post('diagnostic',[DiagnosticController::class,'index'])->name('sales.api.call');
    });

});
