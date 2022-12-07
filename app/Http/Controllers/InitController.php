<?php

namespace App\Http\Controllers;

use App\Models\HelpCentre;
use App\Models\User;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InitController extends Controller
{   
    /** 
     * Check if the user has an active session.
     * Create one if not.
     * 
     * @param Request $request 
     * @param SessionService $service 
     */
    public function startSession(Request $request, SessionService $service): Response
    {
        $sessionData = null;

        if(!empty($request->cookie_id)){
            $sessionData =  $service->getUserSessionData($request->cookie_id);
        }

        return response()->json(
            [
                'data'    => $sessionData ?? $service->createUserSession(),
                'success' => true
            ],
            200
        );
    }
}
