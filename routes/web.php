<?php

use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin-dashboard'], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Admin Management Route 
    Route::resource('/admin', AdminManagementController::class);
    
});
