<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.login');
});


Route::group(
    [
        'prefix'=>'admin',
        'as'=>'admin.',
    ],function(){
        Route::get('/index',[UserController::class,'index'])->name('index');
        Route::get('/user/create',[UserController::class,'create'])->name('user.create');
    });