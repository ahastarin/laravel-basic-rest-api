<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use Illuminate\Support\Facades\Route;



Route::post('register', RegisterController::class);
Route::post('login', SignInController::class);
