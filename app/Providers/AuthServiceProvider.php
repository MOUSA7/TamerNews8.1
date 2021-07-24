<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy'
    ];

    public function boot()
    {
        $this->registerPolicies();
//        Gate::resource('posts',PostPolicy::class);

        foreach (config('glopal.permissions') as $ability=>$value){
            Gate::define($ability,function ($auth) use ($ability){
               return $auth->hasAbility($ability);
            });
        }

    }
}
