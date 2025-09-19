<?php

namespace Src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Application\FilterOption\UseCases\Commands\GetFilterOptionCommand;
use Src\Application\FilterOption\UseCases\Commands\GetFilterOptionCommandHandler;
use Src\Application\Shared\Bus\CommandBus;

class CommandServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CommandBus::class, function ($app) {
            $commandBus = new CommandBus();

            $commandBus->register(
                GetFilterOptionCommand::class,
                $app->make(GetFilterOptionCommandHandler::class)
            );

            return $commandBus;
        });
    }

    public function boot(): void
    {
        //
    }
}
