<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
                
        Passport::tokensExpireIn(now()->addMinutes(env('ACCESS_TOKEN_TTL', 1440))); // one day
        Passport::refreshTokensExpireIn(now()->addDays(10)); // @todo discomment for refresh_token
    }
}
