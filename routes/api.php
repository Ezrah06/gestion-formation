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




//   Paiement
Route::get('/paiement', [App\Http\Controllers\PaiementController::class, 'index']);
Route::post('/paiement', [App\Http\Controllers\PaiementController::class, 'store']);
Route::get('/paiement/{id}', [App\Http\Controllers\PaiementController::class, 'show']);
Route::put('/paiement/{id}', [App\Http\Controllers\PaiementController::class, 'update']);
Route::delete('/paiement/{id}', [App\Http\Controllers\PaiementController::class, 'destroy']);