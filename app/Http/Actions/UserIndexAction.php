<?php
declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Responders\UserResponder;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

final class UserIndexAction extends Controller
{
    private UserService $userService;
    private UserResponder $uesrResponder;
    
    public function __construct(
        UserService $userService,
        UserResponder $userResponder)
    {
        $this->userService = $userService;
        $this->userResponder = $userResponder;
    }

    public function __invoke(Request $request): Response
    {
        $user = $this->userService->retrieveUser($request->query('id','1'));
        return ($this->userResponder)($user);
    }
}