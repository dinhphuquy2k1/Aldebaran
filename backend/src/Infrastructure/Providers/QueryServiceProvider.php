<?php

namespace Src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Application\Category\UseCases\Queries\GetCategoryQuery;
use Src\Application\Category\UseCases\Queries\GetCategoryQueryHandler;
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

            return $queryBus;
        });
    }

    public function boot(): void
    {
        //
    }
}
