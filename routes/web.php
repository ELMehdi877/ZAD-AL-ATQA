<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//cree un utilisateur
Route::post('/user.store', [AdminController::class, 'storeUser'])->name('user.store');

//affiche tous les utilisateurs
Route::get('/users', [AdminController::class, 'index'])->name('users.index');

//modifie les infos d'un utilisateur
Route::put('/user.update/{user}', [AdminController::class, 'updateUser'])->name('user.update');

//changer le status d'un utilisateur
Route::get('/user.status/{id}', [AdminController::class, 'statusUser'])->name('user.status');