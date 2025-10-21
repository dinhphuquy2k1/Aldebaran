<?php

declare(strict_types=1);

namespace Src\Application\Discount\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;
use Src\Application\Shared\Interfaces\IQueryHandler;
use Src\Domain\Discount\Services\IDiscountService;
use Src\Domain\Discount\Snapshots\DiscountSnapshot;

readonly class GetDiscountDetailQueryHandler implements IQueryHandler
{
    public function __construct(
        private IDiscountService $service
    )
    {
    }

    /**
     * @param IQuery $query
     * @return DiscountSnapshot|null
     */
    public function handle(IQuery $query): ?DiscountSnapshot
    {
        return $this->service->getDiscountById($query->getDiscountId());
    }
}
