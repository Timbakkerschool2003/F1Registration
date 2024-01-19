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


//Hier worden de gegevens van de home pagina opgehaald en de home pagina
Route::get('/', [UserController::class, 'index']);
Route::get('/home', [ScoreboardController::class, 'getTime'])->name('get.time');
Route::get('/home', [HomeController::class, 'getTimePersonalHome'])->name('home');
Route::get('/home/{scoreboardId}', [HomeController::class, 'getCircuitDataHome'])->name('home');

//Hier ga je naar de login pagina
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Hier word je naar de register pagina gestuurd
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

//Hier worden de teams opgehaald voor de scoreboards
Route::get('/teams', [TeamsController::class, 'getAllTeams'])->name('teams');

//Hier word de trophies opgehaald, toegevoegd en verwijderd
Route::get('/trophies', [TrophyController::class, 'getAllInfo'])->name('trophies');
Route::get('/addtrophy', [TrophyController::class, 'getTrophies']);
Route::post('/process_trophy_form', [TrophyController::class, 'processTrophyForm'])->name('process_trophy_form');
Route::get('/addtrophy', [TrophyController::class, 'getAllTrophiesForLoggedInUser']);
Route::get('/addtrophy', [TrophyController::class, 'getTrophies'])->name('addtrophy');
Route::delete('/remove_trophy/{trophy}', [TrophyController::class, 'destroy'])->name('remove_trophy');

//Hier word de scoreboard opgehaald
Route::get('/scoreboard', [ScoreboardController::class, 'getTimePersonal'])->name('scoreboard');
Route::get('/scoreboard/circuit/{scoreboardId}', [ScoreboardController::class, 'getCircuitData'])->name('scoreboard');
Route::get('/scoreboard', [ScoreboardController::class, 'getScoreData']);
Route::get('/scoreboard', [ScoreboardController::class, 'getScoreboards'])->name('getScoreboards');
Route::post('/scoreboard/create', [ScoreboardController::class, 'create'])->name('scoreboard.create');


//Hier word het circuit opgehaald voor de scoreboards
Route::get('/circuit', [TeamsController::class, 'getCircuits'])->name('circuit');

//Hier ga je naar de profielen pagina en daar worden ze laten zien
Route::resource('profiles', ProfileController::class);
Route::get('/indexProfiles', [ProfileController::class, 'indexProfiles'])->name('indexProfiles');

//Hier ga je naar de create profile pagina en daar word er een nieuw profiel aangemaakt
Route::get('/create', [ProfileController::class, 'showCreateForm'])->name('createProfile');
Route::post('/create', [ProfileController::class, 'createProfile'])->name('createProfile');

//Hier ga je naar de edit profile pagina en daar worden de gegevens opgehaald uit de database en de nieuwe gegevens naar de database gestuurd
Route::get('/indexProfiles', [UserController::class, 'indexProfiles'])->name('indexProfiles');
Route::get('/edit/{user}', [UserController::class, 'edit'])->name('editProfile');
Route::put('/update/{user}', [UserController::class, 'update'])->name('updateProfile');
Route::delete('/destroyuser/{user}', [UserController::class, 'destroy'])->name('destroyUser');
Route::get('/edit-profile', [ProfileController::class]);

//Hier wordt je naar de edit pagina gestuurd en daar word het wachtwoord geupdated
Route::get('/edit-password', [PasswordController::class, 'edit'])->name('editPassword');
Route::post('/update-password', [PasswordController::class, 'update'])->name('updatePassword');

//Hier word je naar de scorepagina gestuurd en slaat hij de gegevens op
Route::get('/addscore', [ScoreboardController::class, 'addscore'])->name('addscore.create');
Route::post('/addscore', [ScoreboardController::class, 'createScore'])->name('addscore.store');


