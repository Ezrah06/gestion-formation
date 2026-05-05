<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/user', [App\Http\Controllers\AuthController::class, 'user']);
    
    // Routes pour la gestion des utilisateurs
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show']);
    Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
});


// formation
    Route::get('/formation', [App\Http\Controllers\FormationController::class, 'index']);
    Route::post('/formation', [App\Http\Controllers\FormationController::class, 'store']);
    Route::get('/formation/{id}', [App\Http\Controllers\FormationController::class, 'show']);
    Route::put('/formation/{id}', [App\Http\Controllers\FormationController::class, 'update']);
    Route::delete('/formation/{id}', [App\Http\Controllers\FormationController::class, 'destroy']);


    // inscription
    Route::get('/inscription', [App\Http\Controllers\InscriptionController::class, 'index']);
    Route::post('/inscription', [App\Http\Controllers\InscriptionController::class, 'store']);
    Route::get('/inscription/{id}', [App\Http\Controllers\InscriptionController::class, 'show']);
    Route::put('/inscription/{id}', [App\Http\Controllers\InscriptionController::class, 'update']);
    Route::delete('/inscription/{id}', [App\Http\Controllers\InscriptionController::class, 'destroy']);
