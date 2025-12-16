<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('admin.login');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.'],function () {
    Route::get('login', [AdminController::class, 'login'])->name('login');
    Route::post('login', [AdminController::class,'auth'])->name('auth');
    Route::get('dashboard', [AdminController::class, 'index'])->name('index')->middleware('admin');
});


