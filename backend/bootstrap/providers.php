<?php

use Src\Infrastructure\Providers\CategoryServiceProvider;
use Src\Infrastructure\Providers\QueryServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    QueryServiceProvider::class,
    CategoryServiceProvider::class,
];
