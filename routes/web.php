<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HalaqaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Pages users
    Route::get('/users/create', [AdminController::class, 'createUserPage'])->name('users.create');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUserPage'])->name('users.edit');

    //Creer un compte d'un utilisateur
    Route::post('/user.store', [AdminController::class, 'storeUser'])->name('user.store');
    
    //Afficher tous les utilisateurs
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    
    //Modifie les infos d'un utilisateur
    Route::put('/user.update/{user}', [AdminController::class, 'updateUser'])->name('user.update');
    
    //Changer le status d'un utilisateur
    Route::patch('/user.status/{id}', [AdminController::class, 'statusUser'])->name('user.status');

    //Supprimer un utilisateur
    Route::delete('/user.supprime/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');

    //Rechercher un utilisateur par son nom
    Route::get('/user.search', [AdminController::class, 'searchUserByName'])->name('user.search');

    //Creer un Halaqa
    Route::get('/halaqas/create', [AdminController::class, 'createHalaqaPage'])->name('halaqas.create');
    Route::post('/halaqa.store', [AdminController::class, 'storeHalaqa'])->name('halaqa.store');

    //Afficher tous les Halaqas
    Route::get('/halaqas', [HalaqaController::class, 'index'])->name('halaqas.index');
});

require __DIR__.'/auth.php';
