<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/users.search', [AdminController::class, 'searchUserByName'])->name('users.search');
Route::get('/', function () {
    return view('welcome');
});

//Afficher le formulaire pour login
Route::get('login', [AuthController::class, 'showLogin'])->name("login");

//S'authentifier
Route::post('user.login', [AuthController::class, 'login'])->name('user.login');
Route::post('user.logout', [AuthController::class, 'logout'])->name('user.logout');

Route::middleware('auth')->group(function(){
    //Se deconecter

    //Creer un utilisateur
    Route::post('/user.store', [AdminController::class, 'storeUser'])->name('user.store');
    
    //Afficher tous les utilisateurs
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    
    //Modifie les infos d'un utilisateur
    Route::put('/user.update/{user}', [AdminController::class, 'updateUser'])->name('user.update');
    
    //Changer le status d'un utilisateur
    Route::get('/user.status/{id}', [AdminController::class, 'statusUser'])->name('user.status');
    
    //Supprimer un utilisateur
    Route::get('/user.supprime/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');

    //search un utilisateur
});