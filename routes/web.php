<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', App\Http\Controllers\HomeController::class);

Route::resource('/profil', App\Http\Controllers\ProfilController::class);

