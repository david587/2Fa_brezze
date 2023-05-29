<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ClearSessionIfHomePage
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->is('/')) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Session::forget('normal');
            Session::forget('user_2fa');
        }

        return $response;
    }
}
