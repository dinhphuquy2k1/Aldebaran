<?php

declare(strict_types=1);

namespace Src\Domain\Category\Services;

use Src\Domain\Category\ReadRepositories\ICategoryReadRepository;
use Src\Domain\Category\Snapshot\CategorySnapshot;

readonly class CategoryService implements ICategoryService
{
    public function __construct(
        private ICategoryReadRepository $categoryReadRepository
    )
    {
    }


    /**
     * @param array $filters
     * @return CategorySnapshot[]
     */
    public function getCategories(
        array $filters = []
    ): array
    {
        $categories = $this->categoryReadRepository->getCategories($filters);
        $results = [];
        foreach ($categories as $category) {
            $results[] = CategorySnapshot::fromArray($category);
        }

        return $results;
    }
}
