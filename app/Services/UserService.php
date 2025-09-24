<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;

final class UserService
{
    public function retrieveUser(string $id): ?User
    {
        return User::find($id);
    }
}