<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // Validate the incoming registration data
        $validatedAttributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        // Create a new user record in the database
        // The password will be hashed automatically if the User model uses casts or mutators
        $user = User::create($validatedAttributes);

        // Log the newly registered user in immediately
        Auth::login($user);

        // Redirect the user to the jobs page after successful registration
        return redirect('/jobs');
    }
}