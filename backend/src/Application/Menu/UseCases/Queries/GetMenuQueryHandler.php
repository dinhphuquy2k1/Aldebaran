<?php

declare(strict_types=1);

namespace Src\Application\Menu\UseCases\Queries;

use Src\Application\Shared\Interfaces\IQuery;
use Src\Application\Shared\Interfaces\IQueryHandler;
use Src\Domain\Category\Services\ICategoryService;
use Src\Domain\Menu\Services\IMenuService;

readonly class GetMenuQueryHandler implements IQueryHandler
{
    public function __construct(
        private IMenuService $service
    )
    {
    }

    /**
     * @param IQuery $query
     * @return array
     */
    public function handle(IQuery $query): array
    {
        return $this->service->getRecursiveMenus();
    }
}
