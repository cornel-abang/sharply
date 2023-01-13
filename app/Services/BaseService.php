<?php

namespace App\Services;

use App\Models\User;

class BaseService 
{
    public function resolveUser(string $id): User
    {
        return User::findOrFail($id);
    }

    public function mergeUserToRequest(array $data): array
    {
        return array_merge(['user_id' => request()->cookie_id], $data);
    }
}