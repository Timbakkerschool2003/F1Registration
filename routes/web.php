<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\TrophyController;
use App\Http\Controllers\PasswordController;

Route::get('/', [UserController::class, 'index']);
Route::get('/home', [ScoreboardController::class, 'getTime'])->name('get.time');
Route::get('/home', [HomeController::class, 'getTimePersonalHome'])->name('home');
Route::get('/home/{scoreboardId}', [HomeController::class, 'getCircuitDataHome'])->name('home');



Route::get('/edit-profile', [ProfileController::class]);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/teams', [TeamsController::class, 'teamsOphalen'])->name('teams');

Route::get('/trophies', [TrophyController::class, 'haalAlleGegevensOp'])->name('trophies');
Route::get('/addtrophy', [TrophyController::class, 'getTrophies']);
Route::post('/process_trophy_form', [TrophyController::class, 'processTrophyForm'])->name('process_trophy_form');
Route::get('/addtrophy', [TrophyController::class, 'getAllTrophiesForLoggedInUser']);
Route::get('/addtrophy', [TrophyController::class, 'getTrophies'])->name('addtrophy');
Route::delete('/remove_trophy/{trophy}', [TrophyController::class, 'destroy'])->name('remove_trophy');

Route::get('/addscore', [ScoreboardController::class, 'addscore'])->name('addscore');
Route::post('/addscore', [ScoreboardController::class, 'CreateScore'])->name('addscore');

Route::get('/scoreboard', [ScoreboardController::class, 'getTimePersonal'])->name('scoreboard');
Route::get('/scoreboard/circuit/{scoreboardId}', [ScoreboardController::class, 'getCircuitData'])->name('scoreboard');

Route::get('/scoreboard', [ScoreboardController::class, 'getScoreboards'])->name('getScoreboards');
Route::post('/scoreboard/create', [ScoreboardController::class, 'create'])->name('scoreboard.create');

Route::get('/circuit', [TeamsController::class, 'teamsOphalen'])->name('circuit');

Route::get('/indexProfiles', [ProfileController::class, 'indexProfiles'])->name('indexProfiles');

Route::get('/create', [ProfileController::class, 'showCreateForm'])->name('createProfile');
Route::post('/create', [ProfileController::class, 'createProfile'])->name('createProfile');

Route::resource('profiles', ProfileController::class);

Route::get('/indexProfiles', [UserController::class, 'index'])->name('indexProfiles');
Route::get('/edit/{user}', [UserController::class, 'edit'])->name('editProfile');
Route::put('/update/{user}', [UserController::class, 'update'])->name('updateProfile');
Route::delete('/destroyuser/{user}', [UserController::class, 'destroy'])->name('destroyUser');

Route::get('/edit-password', [PasswordController::class, 'edit'])->name('editPassword');
Route::post('/update-password', [PasswordController::class, 'update'])->name('updatePassword');
