<?php

namespace Src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Discount\ReadRepositories\IDiscountReadRepository;
use Src\Domain\Discount\Services\DiscountService;
use Src\Domain\Discount\Services\IDiscountService;
use Src\Infrastructure\Discount\ReadRepositories\DiscountReadRepository;


class DiscountServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bindings
        $this->app->singleton(IDiscountService::class, DiscountService::class);
        $this->app->singleton(IDiscountReadRepository::class, DiscountReadRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
