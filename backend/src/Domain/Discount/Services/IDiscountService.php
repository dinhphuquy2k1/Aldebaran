<?php

declare(strict_types=1);

namespace Src\Domain\Discount\Services;


use Src\Domain\Discount\Snapshots\DiscountSnapshot;

interface IDiscountService
{
    /**
     * @param array $filters
     * @return DiscountSnapshot[]
     */
    public function getDiscounts(array $filters = []): array;

    /**
     * @param int $discountId
     * @return DiscountSnapshot|null
     */
    public function getDiscountById(int $discountId): ?DiscountSnapshot;
}
