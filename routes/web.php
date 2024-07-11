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

        Route::get('legal/request-delete', [App\Http\Controllers\Admin\LegalController::class, 'listDeleteReq'])->name('legal.list-delete-request');
        Route::resource('residence', App\Http\Controllers\Admin\ResidenceController::class);
        Route::resource('legal', App\Http\Controllers\Admin\LegalController::class);
        Route::delete('legal/delete/request/{id}', [App\Http\Controllers\Admin\LegalController::class, 'deleteLegalByReq'])->name('legal.delete-by-request');
    });
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware(['isUser'])->group(function () {
        Route::get('/', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('index');

        Route::resource('residence', App\Http\Controllers\User\ResidenceController::class);
        Route::resource('legal', App\Http\Controllers\User\LegalController::class);
        Route::post('legal/request-delete/{id}', [App\Http\Controllers\User\LegalController::class, 'requestDelete'])->name('legal.request-delete');
    });
});

Route::name('owner.')->prefix('owner')->group(function () {
    Route::middleware(['isOwner'])->group(function () {
        Route::get('/', [App\Http\Controllers\Owner\DashboardController::class, 'index'])->name('index');
    });
});
