<?php

namespace Src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Menu\ReadRepositories\IMenuReadRepository;
use Src\Domain\Menu\Services\IMenuService;
use Src\Domain\Menu\Services\MenuService;
use Src\Infrastructure\Menu\ReadRepositories\MenuReadRepository;


class MenuServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bindings
        $this->app->singleton(IMenuService::class, MenuService::class);
        $this->app->singleton(IMenuReadRepository::class, MenuReadRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
