<?php
use App\Models\Post;
use App\Policies\PostPolicy;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider{
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    public function boot(): void{
        $this->registerPolicies();

        Gate::define('view-admin-dashboard', function ($user){
            return $user->email==='alswns5870@naver.com';
        });
    }
}