<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\HelpCentre;
use Illuminate\Http\Request;
use App\Services\SessionService;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class InitController extends Controller
{   
    /** 
     * Check if the user has an active session.
     * Create one if not.
     * 
     * @param Request        $request 
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

    /** 
     * Generate and return any number of Help Centres.
     * 
     * FOR TEST PURPOSES ONLY
     * 
     * @param int            $count 
     * @param SessionService $service 
     */
    public function returnTestHelpCentres(int $count = 1, SessionService $service): Response
    {
        return response()->json(
            [
                'data'    => $service->createTestHelpCentres($count),
                'success' => true
            ],
            200
        );
    }
}
