<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/callback', function () {
    $userProvider = Socialite::driver('google')->user();
    $user = User::updateOrCreate(
        [
            'email'=> $userProvider->email
        ],[
            'name'=> $userProvider->name,
            'color'=> null
        ]
    );
    // Faire quelque chose avec les données utilisateur ($user)
    $token = $user->createToken('Api token');

    return response()->json([
        'token'=> $token,
        'user' => $user,
    ]);
    // $user->token
});