<?php

declare(strict_types=1);

namespace Src\Application\FilterOption\UseCases\Commands;

use Src\Application\Shared\Interfaces\ICommand;

final readonly class GetFilterOptionCommand implements ICommand
{
    public function __construct(
        public ?int $screenKey,
    )
    {
    }
}
