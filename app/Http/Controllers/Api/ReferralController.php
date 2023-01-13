<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ReferralService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReferralRequest;
use Symfony\Component\HttpFoundation\Response;

class ReferralController extends Controller
{
    /** 
    * POST: api/refer
    *
    * @param ReferralRequest $request 
    * @param ReferralService $service 
    */
    public function postReferral(
        ReferralRequest $request, 
        ReferralService $service
    ): Response
    {
        $referral = $service->create($request->validated());
        
        return response()->json(
            [
                'data'    => $referral,
                'success' => true
            ],
            200
        );
    }

    /** 
    * GET: api/refer/{user_id}/referral/{referral_id}
    *
    * @param string $user_id 
    * @param string $referral_id 
    * @param ReferralService $service
    */
    public function retrieveReferral(
        string $user_id, 
        string $referral_id,
        ReferralService $service
    ): Response
    {
        $referrals = $service->get($user_id, $referral_id);
        
        if ($referrals == null) {
            return response()->json(
                [
                    'data'    => $referrals,
                    'success' => false,
                    'message' => 'No data found for this user'
                ],
                400
            );
        }

        foreach ($referrals as $referral) {
            unset($referral['user_id']);
        }
        $data = [
            'user_id'   => $user_id,
            'referrals' => $referrals
        ];

        return response()->json(
            [
                'data'    => $data,
                'success' => true
            ],
            200
        );
    }
}
