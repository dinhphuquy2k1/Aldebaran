<?php

namespace Src\Infrastructure\FilterOption\ReadRepositories;

use Src\Domain\FilterOption\Models\FilterOption;
use Src\Domain\FilterOption\Models\FilterOptionId;
use Src\Domain\FilterOption\Models\FilterOptionType;
use Src\Domain\FilterOption\ReadRepositories\IFilterOptionReadRepository;
use Src\Domain\Menu\Models\Menu;
use Src\Domain\Menu\Models\MenuId;
use Src\Domain\Menu\Models\MenuType;
use Src\Infrastructure\Shared\Repositories\BaseRepository;

class FilterOptionReadRepository extends BaseRepository implements IFilterOptionReadRepository
{
    /**
     * @param \Src\Infrastructure\FilterOption\Models\FilterOption $model
     */
    public function __construct(
        \Src\Infrastructure\FilterOption\Models\FilterOption $model
    )
    {
        parent::__construct($model);
    }

    /**
     * @param array $filters
     * @return FilterOption[]
     */
    public function getFilterOptions(array $filters = []): array
    {
        $query = $this->model->newQuery();
        foreach ($filters as $key => $value) {
            if ($value !== null) {
                $query->where($key, $value);
            }
        }
        $items = $query->get();
        $results = [];
        foreach ($items as $record) {
            $results[] = new FilterOption(
                new FilterOptionId($record->getAttributeValue('id')),
                $record->getAttributeValue('parent_id') ? new FilterOptionId($record->getAttributeValue('parent_id')) : null,
                (int)$record->getAttributeValue('screen_key'),
                $record->getAttributeValue('label'),
                $record->getAttributeValue('value'),
                new FilterOptionType($record->getAttributeValue('type')),
                $record->getAttributeValue('source_table'),
                $record->getAttributeValue('source_column'),
                (int)$record->getAttributeValue('sort_order'),
            );
        }

        return $results;
    }
}
