<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ScoreboardController; // Update namespace
use App\Http\Controllers\Auth\TrophyController;

Route::get('/', [UserController::class, 'index']);

Route::get('/home', [App\Http\Controllers\ScoreboardController::class, 'getTime'])->name('get.time');

Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class]);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/teams', [TeamsController::class, 'index'])->name('teams');

Route::get('/scoreboard', [ScoreboardController::class, 'getScoreboard'])->name('scoreboard');

Route::get('/scoreboard/add', [ScoreboardController::class, 'create'])->name('scoreboard.create');
Route::post('/scoreboard/add', [ScoreboardController::class, 'store'])->name('scoreboard.store');
Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.index');


Route::get('/trophies', [App\Http\Controllers\TrophyController::class, 'index'])->name('trophies');


Route::get('/scoreboard/add', [ScoreboardController::class, 'create'])->name('scoreboard.create');
Route::post('/scoreboard/add', [ScoreboardController::class, 'store'])->name('scoreboard.store');


Route::post('/scoreboard/add', [ScoreboardController::class, 'storen'])->name('scoreboard.store');

Route::resource('profiles', ProfileController::class);
