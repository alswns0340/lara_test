<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;

final class UserService
{
    public function retrieveUser(string $id): ?User
    {
        $user = User::find($userid);
        
        if( $user){
            $user->purchases = Purchase::where('user_id',$id)->get();
        }

        return $user;
    }
}