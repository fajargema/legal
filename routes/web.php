<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

//Route Matches Register
Route::match(['get', 'post'], '/register', function () {
    return redirect('/login');
});

Auth::routes();

Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    });
});

Route::name('legal.')->prefix('legal')->group(function () {
    Route::middleware(['isUser'])->group(function () {
        Route::get('/', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('index');
    });
});

Route::name('owner.')->prefix('owner')->group(function () {
    Route::middleware(['isOwner'])->group(function () {
        Route::get('/', [App\Http\Controllers\Owner\DashboardController::class, 'index'])->name('index');
    });
});
