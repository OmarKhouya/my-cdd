<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerLoginController extends Controller
{

    public function create()
    {
        // Logic to display the partner login form view
        return view('auth.partner-login'); // Assuming your view is named partner-login.blade.php
    }

    public function attemptLogin(Request $request)
    {
        return Auth::guard('partner')->attempt($request->only('email', 'password'), $request->boolean('remember'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Attempt login using the overridden attemptLogin method
        if (Auth::guard('partner')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Redirect to partner dashboard or relevant route after successful login
            return redirect()->intended('partner/dashboard'); // Replace with your desired route
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
