<?php

declare(strict_types=1);

namespace Src\Application\FilterOption\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;

readonly class GetFilterOptionQuery implements IQuery
{
    public function __construct(
        private ?int $screenKey,
    )
    {
    }

    /**
     * @return int|null
     */
    public function getScreenKey(): ?int
    {
        return $this->screenKey;
    }
}
