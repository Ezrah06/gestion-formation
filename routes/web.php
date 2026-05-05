<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UtilisateurController;

Route::get('/', function () {
    return view('welcome');
});


// Route::apiResource('utilisateurs',UtilisateurController::class);

// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/dashboard', [AuthController::class, 'dashboard']);
