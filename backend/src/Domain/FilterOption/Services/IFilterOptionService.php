<?php

declare(strict_types=1);

namespace Src\Domain\FilterOption\Services;


use Src\Domain\Category\Snapshots\CategorySnapshot;

interface IFilterOptionService
{
    /**
     * @param array $filters
     * @return CategorySnapshot[]
     */
    public function getRecursiveFilterOptions(array $filters = []): array;
}
