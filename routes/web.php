<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ScoreboardController;



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

Route::get('/', [UserController::class, 'index']);

//Route::resource('profiles', ProfileController::class);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\ScoreboardController::class, 'getTime'])->name('get.time');

Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class]);
//Route::get('/teams', function () { return view('teams'); });
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/teams', [TeamsController::class, 'index'])->name('teams');

Route::get('/scoreboard',[App\Http\Controllers\ScoreboardController::class, 'getScoreboard'])->name('scoreboard');

Route::get('/scoreboard/add', [App\Http\Controllers\ScoreboardController::class, 'create'])->name('scoreboard.create');
Route::post('/scoreboard/add', [App\Http\Controllers\ScoreboardController::class, 'store'])->name('scoreboard.store');
// routes/web.php
Route::get('/scoreboard/add', [ScoreboardController::class, 'create']);



Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.index');
Route::get('/scoreboard/add', [ScoreboardController::class, 'create'])->name('scoreboard.create');
// Voeg andere routes toe indien nodig





Route::resource('profiles', ProfileController::class);
