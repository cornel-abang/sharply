<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AuthenticateApi
{
    public function handle(Request $request, Closure $next): JsonResponse | Response
    {
        if (!$request->user_id) {
            return response()->json(['error' => 'Please provide a valid user ID'], 401);
        }

        if ($this->userDoesNotExist($request->user_id)) {
            return response()->json(['error' => 'This user does not exist on our database'], 401);
        }

        return $next($request);
    }

    public function userDoesNotExist(string $user_id): bool
    {
        $user = User::find($user_id);

        if (!$user) {
            return true;
        }
        
        return false;
    }
}
