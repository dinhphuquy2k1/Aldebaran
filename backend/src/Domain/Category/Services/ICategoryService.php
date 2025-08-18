<?php

declare(strict_types=1);

namespace Src\Domain\Category\Services;


use Src\Domain\Category\Snapshot\CategorySnapshot;

interface ICategoryService
{
    /**
     * @param array $filters
     * @return CategorySnapshot[]
     */
    public function getCategories(array $filters = []): array;
}
