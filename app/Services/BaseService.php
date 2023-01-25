<?php

namespace App\Services;

use App\Models\User;
use SebastianBergmann\Type\VoidType;

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

    public function addDOBToUserModel(string $user_id, string $dob): void
    {
        $this->resolveUser($user_id)->update(['dob' => $dob]);
    }
}