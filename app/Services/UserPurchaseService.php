<?php
declare(strict_types=1);

namespace App\Services;

use App\Repository\UserRepositoryInterface;
use App\Models\User;

class UserPurchaseService
{

    public function __construct(
        private UserRepositoryInterface $userRepository
    ){
        
    }

    public function retrievePurchase(int $userId): ?User
    {
        // $user = User::find($userId);
        $user = $this->userRepository->findById($userId);
        if($user){
            // $user->purchases = Purchase::where('user_id', $user->id)->get();
        }

        return $user;
    }
}