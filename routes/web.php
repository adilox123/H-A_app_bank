<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\VirementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Routes publiques pour l'authentification
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes protégées (auth)
Route::middleware('auth')->group(function () {
    // Dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('clients', UserController::class);
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.norm_cl');
Route::resource('comptes', CompteController::class);
Route::resource('virements', VirementController::class);
  
// Afficher le profil
Route::get('/profile', [ProfileController::class, 'show'])->name('auth.profile');

// Mettre à jour le profil (informations)
Route::post('/profile/update', [ProfileController::class, 'update'])->name('auth.profile.update');

// Changer le mot de passe
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('auth.profile.changePassword');

// Changer l'email
Route::post('/profile/change-email', [ProfileController::class, 'changeEmail'])->name('auth.profile.changeEmail');


Route::middleware('auth')->group(function () {
    Route::get('/clients', [UserController::class, 'index'])->name('clients.index');           // liste des clients
    Route::get('/clients/create', [UserController::class, 'create'])->name('clients.create'); // formulaire ajout
    Route::post('/clients', [UserController::class, 'store'])->name('clients.store');         // sauvegarde
    Route::get('/clients/{client}/edit', [UserController::class, 'edit'])->name('clients.edit'); // modifier
    Route::put('/clients/{client}', [UserController::class, 'update'])->name('clients.update');  // mise à jour
    Route::delete('/clients/{client}', [UserController::class, 'destroy'])->name('clients.destroy'); // supprimer
});
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/password', [ProfileController::class, 'changePassword'])->name('profile.password');
});


use App\Http\Controllers\StaticPageController;

// Routes pour les pages statiques
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');


Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');

