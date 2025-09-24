<?php
declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Models\User;

final class UserResponder{
    private ViewFactory $view;
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }
    public function __invoke(?User $user):Response
    {
        $statusCode = $user ? Response::HTTP_OK : Response::HTTP_NOT_FOUND;
        return new Response(
            $this->view->make('user.index',['user'=>$user]),
            $statusCode);
    }
}