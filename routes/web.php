<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\TrophyController;
use App\Http\Controllers\CircuitController;



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

Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.index');

Route::get('/trophies', [App\Http\Controllers\TrophyController::class, 'index'])->name('trophies');

Route::get('/scoreboard/addscore', [ScoreboardController::class, 'addscore'])->name('addscore');
Route::get('/scoreboard/addscore', [TeamsController::class, 'teamsOphalen'])->name('addscore');


//Route::post('/scoreboard/create', [ScoreboardController::class, 'store'])->name('scoreboard.store');

Route::get('/scoreboard', [ScoreboardController::class, 'getScoreboard'])->name('scoreboard.getScoreboard');

Route::get('/circuit', [CircuitController::class, 'circuit'])->name('circuit');

Route::resource('profiles', ProfileController::class);

Route::get('/profiles', [ProfileController::class, 'showprofiles'])->name('profiles.showprofiles');

