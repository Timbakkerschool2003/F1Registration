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

Route::get('/teams', [TeamsController::class, 'teamsOphalen'])->name('teams');

Route::get('/trophies', [App\Http\Controllers\TrophyController::class, 'index'])->name('trophies');

Route::get('/addscore', [ScoreboardController::class, 'addscore'])->name('addscore');

Route::get('/scoreboard', [ScoreboardController::class, 'getScoreboards'])->name('getScoreboards');

Route::get('/circuit', [TeamsController::class, 'teamsOphalen'])->name('teams');
Route::get('/circuit', [TeamsController::class, 'circuitOphalen'])->name('circuit');

Route::get('/indexProfiles', [ProfileController::class, 'indexProfiles'])->name('indexProfiles');
Route::get('/create', [ProfileController::class, 'createProfiles'])->name('createProfiles');

Route::resource('profiles', ProfileController::class);


