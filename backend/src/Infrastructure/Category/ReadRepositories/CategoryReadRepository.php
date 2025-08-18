<?php

namespace Src\Infrastructure\Category\ReadRepositories;

use Src\Domain\Category\Models\Category;
use Src\Domain\Category\Models\CategoryId;
use Src\Domain\Category\ReadRepositories\ICategoryReadRepository;
use Src\Infrastructure\Shared\Repositories\BaseRepository;

class CategoryReadRepository extends BaseRepository implements ICategoryReadRepository
{
    /**
     * @param \Src\Infrastructure\Category\Models\Category $model
     */
    public function __construct(
        \Src\Infrastructure\Category\Models\Category $model
    )
    {
        parent::__construct($model);
    }

    /**
     * @param array $filters
     * @return Category[]
     */
    public function getCategories(
        array $filters = []
    ): array
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
            $results[] = new Category(
                new CategoryId($record->getAttributeValue('id')),
                $record->getAttributeValue('name'),
                $record->getAttributeValue('parent_id') ? new CategoryId($record->getAttributeValue('parent_id')) : null,
                $record->getAttributeValue('description'),
            );
        }

        return $results;
    }
}
