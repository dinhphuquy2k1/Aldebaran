<?php

declare(strict_types=1);

namespace Src\Domain\Category\Services;

use Illuminate\Support\Facades\Cache;
use Src\Domain\Category\ReadRepositories\ICategoryReadRepository;
use Src\Domain\Category\Snapshot\CategorySnapshot;

readonly class CategoryService implements ICategoryService
{
    private const CACHE_KEY = 'categories';

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
        if (Cache::has(self::CACHE_KEY)) {
            return Cache::get(self::CACHE_KEY);
        }

        $categories = $this->categoryReadRepository->getCategories($filters);
        $results = [];
        foreach ($categories as $category) {
            $results[] = CategorySnapshot::fromArray($category);
        }

        Cache::put(self::CACHE_KEY, $results);
        return $results;
    }
}
