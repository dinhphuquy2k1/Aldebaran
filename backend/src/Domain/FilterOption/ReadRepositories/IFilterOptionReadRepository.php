<?php

namespace Src\Domain\FilterOption\ReadRepositories;

use Src\Domain\FilterOption\Models\FilterOption;
use Src\Domain\Shared\Repositories\IBaseRepository;

interface IFilterOptionReadRepository extends IBaseRepository
{
    /**
     * @param array $filters
     * @return FilterOption[]
     */
    public function getFilterOptions(array $filters = []): array;
}
