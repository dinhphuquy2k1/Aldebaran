<?php

declare(strict_types=1);

namespace Src\Application\FilterOption\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;
use Src\Application\Shared\Interfaces\IQueryHandler;
use Src\Domain\FilterOption\Services\IFilterOptionService;

readonly class GetFilterOptionQueryHandler implements IQueryHandler
{
    public function __construct(
        private IFilterOptionService $service
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
            'screen_key' => $query->getScreenKey(),
        ];

        return $this->service->getRecursiveFilterOptions(filters: array_filter($filters));
    }
}
