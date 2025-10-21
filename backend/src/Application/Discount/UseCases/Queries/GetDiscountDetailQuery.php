<?php

declare(strict_types=1);

namespace Src\Application\Discount\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;

readonly class GetDiscountDetailQuery implements IQuery
{
    public function __construct(
        private int $discountId,
    )
    {
    }

    /**
     * @return int
     */
    public function getDiscountId(): int
    {
        return $this->discountId;
    }
}
