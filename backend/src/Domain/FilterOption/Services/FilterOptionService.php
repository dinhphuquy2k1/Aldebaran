<?php

declare(strict_types=1);

namespace Src\Domain\FilterOption\Services;

use Src\Domain\Category\Snapshots\CategorySnapshot;
use Src\Domain\FilterOption\Models\FilterOption;
use Src\Domain\FilterOption\ReadRepositories\IFilterOptionReadRepository;
use Src\Domain\FilterOption\Snapshots\FilterOptionSnapshot;

readonly class FilterOptionService implements IFilterOptionService
{
    public function __construct(
        private IFilterOptionReadRepository $filterOptionReadRepository
    )
    {
    }

    /**
     * @param array $filters
     * @return CategorySnapshot[]
     */
    public function getRecursiveFilterOptions(
        array $filters = []
    ): array
    {
        $filters = $this->filterOptionReadRepository->getFilterOptions($filters);
        return $this->recursiveFilterOption($filters);
    }

    /**
     * @param FilterOption[] $filterOptions
     * @param $parentId
     * @return array
     */
    private function recursiveFilterOption(array $filterOptions, $parentId = null): array
    {
        $result = [];
        foreach ($filterOptions as $filterOption) {
            if ($parentId == $filterOption->getParentId()?->getValue()) {
                $category = get_object_vars(FilterOptionSnapshot::fromArray($filterOption));
                $category['children'] = $this->recursiveFilterOption($filterOptions, $filterOption->getFilterOptionId()->getValue());
                $result[] = $category;
            }
        }
        return $result;
    }
}
