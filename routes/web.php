<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/admin');
    } else {
        return redirect('/login');
    }
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
        Route::put('legal/edit-document/{id}', [App\Http\Controllers\Admin\LegalController::class, 'editDocument'])->name('legal.edit-document');
        Route::delete('legal/cancel/delete/{id}', [App\Http\Controllers\Admin\LegalController::class, 'cancelDeleteLegal'])->name('legal.cancel-delete');
        Route::delete('legal/delete/request/{id}', [App\Http\Controllers\Admin\LegalController::class, 'deleteLegalByReq'])->name('legal.delete-by-request');
        Route::post('legal/filter/residence', [App\Http\Controllers\Admin\LegalController::class, 'changeResidence'])->name('legal.change-residence');

        Route::resource('user', App\Http\Controllers\Admin\UserController::class);
        Route::put('user/reset-password/{id}', [App\Http\Controllers\Admin\UserController::class, 'resetPassword'])->name('user.reset-password');
    });
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware(['isUser'])->group(function () {
        Route::get('/', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('index');

        Route::resource('residence', App\Http\Controllers\User\ResidenceController::class);

        Route::resource('legal', App\Http\Controllers\User\LegalController::class);
        Route::post('legal/request-delete/{id}', [App\Http\Controllers\User\LegalController::class, 'requestDelete'])->name('legal.request-delete');
        Route::put('legal/edit-document/{id}', [App\Http\Controllers\User\LegalController::class, 'editDocument'])->name('legal.edit-document');
        Route::post('legal/filter/residence', [App\Http\Controllers\User\LegalController::class, 'changeResidence'])->name('legal.change-residence');
    });
});

Route::name('owner.')->prefix('owner')->group(function () {
    Route::middleware(['isOwner'])->group(function () {
        Route::get('/', [App\Http\Controllers\Owner\DashboardController::class, 'index'])->name('index');

        Route::get('/residence', [App\Http\Controllers\Owner\ResidenceController::class, 'index'])->name('residence.index');

        Route::get('/legal', [App\Http\Controllers\Owner\LegalController::class, 'index'])->name('legal.index');
        Route::get('/legal/{id}', [App\Http\Controllers\Owner\LegalController::class, 'show'])->name('legal.show');
        Route::post('legal/filter/residence', [App\Http\Controllers\Owner\LegalController::class, 'changeResidence'])->name('legal.change-residence');
    });
});
