<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface{
    public function findById(int $userId):?User
    {
        return User::find($userId);
    }
}