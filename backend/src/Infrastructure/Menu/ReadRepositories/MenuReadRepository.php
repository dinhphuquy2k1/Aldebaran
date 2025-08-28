<?php

namespace Src\Infrastructure\Menu\ReadRepositories;

use Src\Domain\Menu\Models\Menu;
use Src\Domain\Menu\Models\MenuId;
use Src\Domain\Menu\Models\MenuType;
use Src\Domain\Menu\ReadRepositories\IMenuReadRepository;
use Src\Domain\MenuGroup\Models\MenuGroup;
use Src\Domain\MenuGroup\Models\MenuGroupId;
use Src\Infrastructure\Shared\Repositories\BaseRepository;

class MenuReadRepository extends BaseRepository implements IMenuReadRepository
{
    /**
     * @param \Src\Infrastructure\Menu\Models\Menu $model
     */
    public function __construct(
        \Src\Infrastructure\Menu\Models\Menu $model
    )
    {
        parent::__construct($model);
    }

    /**
     * @param array $filters
     * @return Menu[]
     */
    public function getMenus(
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
            $results[] = new Menu(
                new MenuId($record->getAttributeValue('id')),
                $record->getAttributeValue('label'),
                $record->getAttributeValue('icon'),
                new MenuType($record->getAttributeValue('menu_type')),
                $record->getAttributeValue('route'),
                $record->getAttributeValue('parent_id') ? new MenuId($record->getAttributeValue('parent_id')) : null,
                $record->getAttributeValue('display'),
            );
        }

        return $results;
    }
}
