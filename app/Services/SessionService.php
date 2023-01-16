<?php

namespace App\Services;

use App\Models\User;
use App\Models\HelpCentre;
use Illuminate\Database\Eloquent\Collection;

class SessionService
{
    /** 
    * Get active user session data and return it  
    * @param string $user_id
    */
    public function getUserSessionData(string $user_id): ?User
    {
        return User::with('appointments')->find($user_id);
    }

    /** 
     * Create a new active session for the user
     * 
     * We use factory to create because:
     * we don't get any data from the user yet
     * so we need to create random data to hold user session
     * until the user decides to produce such data
    */
    public function createUserSession()
    {
        return User::factory()->create();
    }

    /** 
    * @param int $count
    */
    public function createTestHelpCentres(int $count): Collection
    {
        return HelpCentre::factory(['address' => '50 Daniel Close, Gwarimpa, FCT Abuja'])->count($count)->create();
    }
}