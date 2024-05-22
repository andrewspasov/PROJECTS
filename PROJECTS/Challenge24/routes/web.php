<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect('/home');
});


Route::get('/home', [HomeController::class, 'home'])->name('home');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('projects', ProjectController::class)->middleware('auth');

Route::post('/contact', [HomeController::class, 'sendContactEmail'])->name('send-contact');
