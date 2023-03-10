<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;



Route::get('user', UserController::class);
Route::post('register', RegisterController::class);
Route::post('login', SignInController::class);
Route::post('logout', LogoutController::class);

Route::post('create-new-article', [ArticleController::class, 'store']);
Route::patch('update-article/{article}', [ArticleController::class, 'update']);
Route::delete('delete-article/{article}', [ArticleController::class, 'destroy']);

Route::get('/', [ArticleController::class, 'index']);
Route::get('articles/{article}', [ArticleController::class, 'show']);