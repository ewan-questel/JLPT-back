<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Redirect the user to the Google authentication page
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);

// Google callback to handle the user after authentication
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
