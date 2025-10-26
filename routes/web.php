<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth','role:superadmin'])
    ->group(function () {
        Route::resource('user', UserController::class);
    });
    


