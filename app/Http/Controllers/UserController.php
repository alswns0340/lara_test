<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    // 
    public function index(Request $request): View
    {
        $user = User::find($request->query('id',1));
        return view('user.index',['user'=>$user]);
    }

    public function store(Request $request):RedirectResponse
    {
        return redirect('/uesr');
    }
}
