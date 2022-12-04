<?php

namespace App\Services;

use App\Models\User;

class SessionService
{
    /** 
    * Get active user session data and return it  
    * @param string $cookie_id
    */
    public function getUserSessionData(string $cookie_id): ?User
    {
        return User::with('appointments')->find($cookie_id);
    }

    /** 
     * Create a new active session for the user
     * 
     * We use factory to create because:
     * we don't receieve any data from the user yet
     * so we need to create random data to hold user session
     * until the user decides to produce such data
    */
    public function createUserSession()
    {
        return User::factory()->create();
    }
}