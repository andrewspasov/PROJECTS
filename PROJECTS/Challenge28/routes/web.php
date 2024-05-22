<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
    })->middleware('redirect.role');
    
});

Route::get('/admin/admin-dashboard', function () {
    return view('admin.admin-dashboard');
})->middleware(['auth', 'isAdmin'])->name('admin.dashboard');

Route::get('/user/user-dashboard', function () {
    return view('user.user-dashboard');
})->middleware('auth')->name('user.dashboard');


Route::get('/validation/{email}/{token}', 'App\Http\Controllers\AuthController@activateUser');

Route::post('/activation/resend', 'App\Http\Controllers\AuthController@resendActivationLink')->name('activation.resend');


Route::get('/expired-link', function () {
    return view('expired_link');
})->name('expired-link');


Route::get('/validation/{token}', [App\Http\Controllers\AuthController::class, 'activateUser'])->name('activation.validate');
