<?php

declare(strict_types=1);

namespace Src\Application\Discount\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;

readonly class GetDiscountQuery implements IQuery
{
    public function __construct(
        private ?int $discountId = null,
    )
    {
    }

    /**
     * @return int|null
     */
    public function getDiscountId(): ?int
    {
        return $this->discountId;
    }
}
