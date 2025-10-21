<?php

use Src\Infrastructure\Providers\CategoryServiceProvider;
use Src\Infrastructure\Providers\CommandServiceProvider;
use Src\Infrastructure\Providers\DiscountServiceProvider;
use Src\Infrastructure\Providers\FilterOptionServiceProvider;
use Src\Infrastructure\Providers\MenuServiceProvider;
use Src\Infrastructure\Providers\QueryServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    QueryServiceProvider::class,
    CommandServiceProvider::class,
    CategoryServiceProvider::class,
    MenuServiceProvider::class,
    FilterOptionServiceProvider::class,
    DiscountServiceProvider::class,
];
