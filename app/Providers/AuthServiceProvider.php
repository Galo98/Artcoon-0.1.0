<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Background' => 'App\Policies\BackgroundPolicy',
        'App\Character' => 'App\Policies\CharacterPolicy',
        'App\Size' => 'App\Policies\SizePolicy',
        'App\Type' => 'App\Policies\TypePolicy'
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
