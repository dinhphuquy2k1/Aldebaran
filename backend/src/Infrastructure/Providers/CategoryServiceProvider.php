<?php

namespace Src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Category\ReadRepositories\ICategoryReadRepository;
use Src\Domain\Category\Services\CategoryService;
use Src\Domain\Category\Services\ICategoryService;
use Src\Infrastructure\Category\ReadRepositories\CategoryReadRepository;


class CategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bindings
        $this->app->singleton(ICategoryService::class, CategoryService::class);
        $this->app->singleton(ICategoryReadRepository::class, CategoryReadRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
