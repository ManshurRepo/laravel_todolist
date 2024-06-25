<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Services\UserService;
use App\Services\impl\UserServiceImpl; // Pastikan namespace ini sesuai

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UserService::class => UserServiceImpl::class,
    ];

    public function provides(): array
    {
        return [UserService::class];
    }

    public function register()
    {
        // Tidak perlu ada operasi register tambahan jika tidak diperlukan
    }

    public function boot()
    {
        // Tidak perlu ada operasi boot tambahan jika tidak diperlukan
    }
}
