<?php

declare(strict_types=1);

namespace Src\Application\Discount\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;
use Src\Application\Shared\Interfaces\IQueryHandler;
use Src\Domain\Discount\Services\IDiscountService;

readonly class GetDiscountQueryHandler implements IQueryHandler
{
    public function __construct(
        private IDiscountService $service
    )
    {
    }

    /**
     * @param IQuery $query
     * @return array
     */
    public function handle(IQuery $query): array
    {
        $filters = [
            'id' => $query->getDiscountId(),
        ];

        return $this->service->getDiscounts(filters: array_filter($filters));
    }
}
