<?php
declare(strict_types=1);

namespace App\Http\Controllers\Layered;

use App\Services\UserPurchaseService;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

final class UserController extends Controller
{
    public function __construct(private UserPurchaseService $service)
    {
    }

    public function index(string $id) : View
    {
        $user = $this->service->retrievePurchase(intval($id));

        return view('user.index',['user'=> $user]);
    }
}