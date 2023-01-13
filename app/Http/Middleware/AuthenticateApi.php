<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AuthenticateApi
{
    public function handle(Request $request, Closure $next): JsonResponse | Response
    {
        if (!$request->user_id) {
            return response()->json(['error' => 'Please provide a valid Cookie ID'], 401);
        }

        return $next($request);
    }
}
