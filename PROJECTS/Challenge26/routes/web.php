<?php

use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('matches', FootballMatchController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);

    Route::get('/fetch-players/{teamId}', [PlayerController::class, 'fetchPlayers']);

});

Route::get('/matches', [FootballMatchController::class, 'index'])
    ->middleware('auth')
    ->name('matches.index');


