<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HalaqaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});


Route::middleware(['auth', 'check.status'])->group(function () {
  
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        
        //Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


        /*        
            * Routes pour la gestion des utilisateurs
         */

        //Afficher le formulaire de creation d'un utilisateur
        Route::get('/users/create', [AdminController::class, 'createUserPage'])->name('users.create');

        //Enregistrer un utilisateur
        Route::post('/user.store', [AdminController::class, 'storeUser'])->name('user.store');

        //Afficher le formulaire de modification d'un utilisateur
        Route::get('/users/{user}/edit', [AdminController::class, 'editUserPage'])->name('users.edit');
        
        //Modifie les infos d'un utilisateur
        Route::put('/user.update/{user}', [AdminController::class, 'updateUser'])->name('user.update');

        //Afficher tous les utilisateurs
        Route::get('/users', [AdminController::class, 'index'])->name('users.index');
        
        //Modifier le status d'un utilisateur
        Route::patch('/user.status/{id}', [AdminController::class, 'statusUser'])->name('user.status');

        //Supprimer un utilisateur
        Route::delete('/user.supprime/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');

        //Rechercher un utilisateur par son nom
        Route::get('/user.search', [AdminController::class, 'searchUserByName'])->name('user.search');
        

        /*  
            * Routes pour la gestion des Halaqas
         */

        //Afficher le formulaire de creation d'un Halaqa
        Route::get('/halaqas/create', [HalaqaController::class, 'createHalaqaPage'])->name('halaqas.create');

        //Enregistrer un Halaqa
        Route::post('/halaqa.store', [HalaqaController::class, 'store'])->name('halaqa.store');

        //Afficher le formulaire de modification d'un Halaqa
        Route::get('/halaqas/{halaqa}/edit', [HalaqaController::class, 'edit'])->name('halaqas.edit');

        //Modifier les infos d'un Halaqa
        Route::put('/halaqas/{halaqa}', [HalaqaController::class, 'update'])->name('halaqas.update');

        //Supprimer un Halaqa
        Route::delete('/halaqas/{halaqa}', [HalaqaController::class, 'destroy'])->name('halaqas.destroy');

        //Afficher tous les Halaqas
        Route::get('/halaqas', [HalaqaController::class, 'index'])->name('halaqas.index');

        /*
            * Routes pour la gestion des Competitions
         */

        
        
});

require __DIR__.'/auth.php';
