<?php

namespace Src\Domain\Category\ReadRepositories;

use Src\Domain\Category\Models\Category;
use Src\Domain\Shared\Repositories\IBaseRepository;

interface ICategoryReadRepository extends IBaseRepository
{
    /**
     * @param array $filters
     * @return Category[]
     */
    public function getCategories(array $filters = []): array;
}
