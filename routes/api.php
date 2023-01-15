<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('user', UserController::class);
Route::post('register', RegisterController::class);
Route::post('login', SignInController::class);
Route::post('logout', LogoutController::class);