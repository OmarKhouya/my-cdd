<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        if (!Auth::guard('partner')->check()) {
            return route('partner.login'); // Redirect to partner login
        }

        return route('login'); // Default redirect for other guards
    }
}
