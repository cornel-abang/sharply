<?php

namespace App\Services;

use App\Models\User;

class BaseService 
{
    public function resolveUser(string $id): ?User
    {
        return User::findOrFail($id);
    }
}