<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::match(['get', 'post'], 'login', [AdminController::class, 'login'])->name('admin.login');
    
    Route::middleware([Admin::class])->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

      
    });
});

