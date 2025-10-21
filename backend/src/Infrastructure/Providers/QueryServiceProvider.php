<?php

namespace Src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Application\Category\UseCases\Queries\GetCategoryQuery;
use Src\Application\Category\UseCases\Queries\GetCategoryQueryHandler;
use Src\Application\Discount\UseCases\Queries\GetDiscountDetailQuery;
use Src\Application\Discount\UseCases\Queries\GetDiscountDetailQueryHandler;
use Src\Application\Discount\UseCases\Queries\GetDiscountQuery;
use Src\Application\Discount\UseCases\Queries\GetDiscountQueryHandler;
use Src\Application\FilterOption\UseCases\Queries\GetFilterOptionQuery;
use Src\Application\FilterOption\UseCases\Queries\GetFilterOptionQueryHandler;
use Src\Application\Menu\UseCases\Queries\GetMenuQuery;
use Src\Application\Menu\UseCases\Queries\GetMenuQueryHandler;
use Src\Application\Shared\Bus\QueryBus;

class QueryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(QueryBus::class, function ($app) {
            $queryBus = new QueryBus();

            $queryBus->register(
                GetCategoryQuery::class,
                $app->make(GetCategoryQueryHandler::class)
            );

            $queryBus->register(
                GetMenuQuery::class,
                $app->make(GetMenuQueryHandler::class)
            );

            $queryBus->register(
                GetFilterOptionQuery::class,
                $app->make(GetFilterOptionQueryHandler::class)
            );

            $queryBus->register(
                GetDiscountQuery::class,
                $app->make(GetDiscountQueryHandler::class)
            );

            $queryBus->register(
                GetDiscountDetailQuery::class,
                $app->make(GetDiscountDetailQueryHandler::class)
            );

            return $queryBus;
        });
    }

    public function boot(): void
    {
        //
    }
}
