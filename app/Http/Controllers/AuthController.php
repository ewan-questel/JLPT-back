<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Your existing login, register, and logout logic...

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Handle exception (e.g., user denied access)
            return redirect('/');
        }

        // Check if the user already exists in your database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user in your database
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                // Additional fields as needed
            ]);

            // Log in the new user
            Auth::login($newUser);
        }

        // Redirect to the intended page after login
        return redirect('/dashboard');
    }
}