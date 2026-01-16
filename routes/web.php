<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\Settings;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::view('dashboard', 'user.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');

    // Movie management (authenticated)
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movie/store', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
    Route::get('/movies/dashboard', [MovieController::class, 'dashboard'])->name('movies.dashboard');

    // Tickets dashboard
    Route::get('/tickets/dashboard', [TicketController::class, 'dashboard'])->name('tickets.dashboard');

    //All pages in one
    Route::resource('cinemas', CinemaController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('halls', HallController::class);
    Route::resource('plays', PlayController::class);
    Route::resource('tickets', TicketController::class);

    //making a ticket
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::get('/tickets/create/{movie}', [TicketController::class, 'choosePlay'])->name('tickets.choosePlay');
    Route::get('/tickets/create/{movie}/{play}', [TicketController::class, 'chooseSeat'])->name('tickets.chooseSeat');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

    //user 
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/info/{user}', [UserController::class, 'info'])->name('user.info');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');

    //raport
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});

// Public movie routes
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');



require __DIR__ . '/auth.php';
