<?php

namespace Src\Application\Shared\Interfaces;

interface ICommandBus
{
    public function register(string $commandClass, ICommandHandler $handler): void;

    public function dispatch(ICommand $command);
}
