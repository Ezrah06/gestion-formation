<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UtilisateurController;

Route::get('/', function () {
    return view('welcome');
});


// Route::apiResource('utilisateurs',UtilisateurController::class);
