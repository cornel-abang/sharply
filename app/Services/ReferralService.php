<?php

namespace App\Services;

use App\Models\Referral;
use App\Jobs\ReferralEmailJob;
use Illuminate\Database\Eloquent\Collection;

class ReferralService extends BaseService
{
    /** 
    * Create a referral 
    * @param array $data
    */
    public function create(array $data): ?Referral
    {
        $referral = Referral::create($data);

        /** Trigger job to send referral email */ 
        // ReferralEmailJob::dispatch($referral);
        
        return $referral;
    }

    /** 
    * Retrieve a referral 
    * @param string $user_id
    * @param string $referral_id
    */
    public function get(string $user_id, string $referral_id): ?Collection
    {
        $user = $this->resolveUser($user_id);
        if ($user) {
            return $user->referrals;
        }

        return null;
    }
}