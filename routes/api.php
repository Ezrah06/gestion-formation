<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\utilisateurController ;

Route::apiResource('utilisateurs',utilisateurController ::class);

