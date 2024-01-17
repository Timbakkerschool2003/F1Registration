<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\TrophyController;

Route::get('/', [UserController::class, 'index']);
Route::get('/home', [ScoreboardController::class, 'getTime'])->name('get.time');

Route::get('/edit-profile', [ProfileController::class]);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/teams', [TeamsController::class, 'teamsOphalen'])->name('teams');

// Commenting out the old /trophies routes
// Route::get('/trophies', [TrophyController::class, 'haalAlleTrophyGegevensOp'])->name('trophies');
// Route::get('/trophies', [TrophyController::class, 'voorbeeldGebruik'])->name('trophies');

// Adding the new /trophies route
Route::get('/trophies', [TrophyController::class, 'haalAlleGegevensOp'])->name('trophies');
Route::get('/addtrophy', [TrophyController::class, 'getTrophies']);
Route::post('/process_trophy_form', [TrophyController::class, 'processTrophyForm'])->name('process_trophy_form');
Route::get('/addtrophy', [TrophyController::class, 'getAllTrophiesForLoggedInUser']);


Route::get('/addscore', [ScoreboardController::class, 'addscore'])->name('addscore');
Route::post('/addscore', [ScoreboardController::class, 'CreateScore'])->name('addscore');

Route::get('/scoreboard', [ScoreboardController::class, 'getScoreboards'])->name('getScoreboards');
Route::post('/scoreboard/create', [ScoreboardController::class, 'create'])->name('scoreboard.create');

Route::get('/circuit', [TeamsController::class, 'teamsOphalen'])->name('teams');
Route::get('/circuit', [TeamsController::class, 'circuitOphalen'])->name('circuit');

Route::get('/indexProfiles', [ProfileController::class, 'indexProfiles'])->name('indexProfiles');

Route::get('/create', [ProfileController::class, 'showCreateForm'])->name('createProfile');
Route::post('/create', [ProfileController::class, 'createProfile'])->name('createProfile');
Route::post('/create', 'YourController@create')->name('create');

Route::resource('profiles', ProfileController::class);
