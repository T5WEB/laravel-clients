<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::get('/users-index', [UserController::class, 'index'])->name('user.index');
    Route::get('/users-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/edit-update/{id}', [UserController::class, 'update'])->name('user.update');

    // Clientes
    Route::resources([
        'cliente' => ClienteController::class
    ]);

    //Meus Clientes
    Route::get('/meus-clientes/{id}', [ClienteController::class, 'meus_clientes'])->name('meus.clientes');
});

require __DIR__.'/auth.php';
