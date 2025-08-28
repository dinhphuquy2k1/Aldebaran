<?php

namespace Src\Domain\Menu\ReadRepositories;

use Src\Domain\Category\Models\Category;
use Src\Domain\Menu\Models\Menu;
use Src\Domain\Shared\Repositories\IBaseRepository;

interface IMenuReadRepository extends IBaseRepository
{
    /**
     * @param array $filters
     * @return Menu[]
     */
    public function getMenus(array $filters = []): array;
}
