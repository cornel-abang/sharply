<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthenticateApi
{
    public function handle(Request $request, Closure $next): RedirectResponse|JsonResponse
    {
        if (!$request->cookie_id) {
            return response()->json(['error' => 'Please provide a valid Cookie ID'], 401);
        }

        return $next($request);
    }
}
