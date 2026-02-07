<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }


    public function store()
    {
        // If validation fails, Laravel automatically redirects back with errors
        $credentials = request()->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Auth::attempt() does two things at once:  
        // 1- authenticate the user using the provided credentials returns false if email or password is incorrect
        // 2-Automatically login the user (session is set and user is authenticated) if credentials valid 
        if (! Auth::attempt($credentials)) {

            // Manually throw a validation error if authentication fails. 
            //ValidationException automatically redirects back but we manually add our specific errors.
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }

        // Regenerate the session ID after generate it when login
        // This protects against (session fixation attacks)
        request()->session()->regenerate();

        // Redirect the authenticated user to the jobs page
        return redirect('/jobs');
    }


    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}