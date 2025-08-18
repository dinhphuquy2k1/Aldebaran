<?php

declare(strict_types=1);

namespace Src\Application\Category\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;
use Src\Application\Shared\Interfaces\IQueryHandler;
use Src\Domain\Category\Services\ICategoryService;

readonly class GetCategoryQueryHandler implements IQueryHandler
{
    public function __construct(
        private ICategoryService $service
    )
    {
    }

    /**
     * @param IQuery $query
     * @return array
     */
    public function handle(IQuery $query): array
    {
        return $this->service->getCategories();
    }
}
