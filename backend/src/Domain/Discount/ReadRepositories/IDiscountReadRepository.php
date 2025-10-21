<?php

namespace Src\Domain\Discount\ReadRepositories;

use Src\Domain\Discount\Models\Discount;
use Src\Domain\Shared\Repositories\IBaseRepository;

interface IDiscountReadRepository extends IBaseRepository
{
    /**
     * @param array $filters
     * @return Discount[]
     */
    public function getDiscounts(array $filters = []): array;

    /**
     * @param int $discountId
     * @return Discount|null
     */
    public function getDiscountById(int $discountId): ?Discount;
}
