<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Services\TodolistService;
use App\Services\Impl\TodolistServiceImpl;

class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->singleton(TodolistService::class, TodolistServiceImpl::class);
    }

    public function provides()
    {
        return [TodolistService::class];
    }
}
