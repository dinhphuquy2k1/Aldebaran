<?php

namespace Src\Application\Shared\Interfaces;

interface ICommandHandler
{
    /**
     * @param ICommand $command
     *
     * @return mixed
     */
    public function handle(ICommand $command): mixed;
}
