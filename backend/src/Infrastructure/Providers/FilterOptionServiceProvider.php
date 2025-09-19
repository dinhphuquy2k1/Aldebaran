<?php

namespace Src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\FilterOption\ReadRepositories\IFilterOptionReadRepository;
use Src\Domain\FilterOption\Services\FilterOptionService;
use Src\Domain\FilterOption\Services\IFilterOptionService;
use Src\Infrastructure\FilterOption\ReadRepositories\FilterOptionReadRepository;


class FilterOptionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bindings
        $this->app->singleton(IFilterOptionService::class, FilterOptionService::class);
        $this->app->singleton(IFilterOptionReadRepository::class, FilterOptionReadRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
