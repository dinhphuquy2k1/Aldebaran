<?php

declare(strict_types=1);

namespace Src\Domain\Menu\Services;

use Illuminate\Support\Facades\Cache;
use Src\Domain\Menu\Models\Menu;
use Src\Domain\Menu\ReadRepositories\IMenuReadRepository;
use Src\Domain\Menu\Snapshots\MenuSnapshot;

readonly class MenuService implements IMenuService
{
    private const CACHE_KEY = 'recursiveMenus';

    public function __construct(
        private IMenuReadRepository $menuReadRepository
    )
    {
    }


    /**
     * @param array $filters
     * @return MenuSnapshot[]
     */
    public function getRecursiveMenus(
        array $filters = []
    ): array
    {
        if (Cache::has(self::CACHE_KEY)) {
            return Cache::get(self::CACHE_KEY);
        }

        $menus = $this->menuReadRepository->getMenus($filters);
        $results = $this->recursiveMenu($menus);
        Cache::put(self::CACHE_KEY, $results);
        return $results;
    }

    /**
     * @param Menu[] $menus
     * @param $parentId
     * @return array
     */
    private function recursiveMenu(array $menus, $parentId = null): array
    {
        $result = [];
        foreach ($menus as $menu) {
            if ($parentId == $menu->getParentId()?->getValue()) {
                $category = get_object_vars(MenuSnapshot::fromArray($menu));
                $category['key'] = $category['menuId'];
                $category['items'] = $this->recursiveMenu($menus, $menu->getMenuId()->getValue());
                $category['routes'] = array_column($category['items'], 'route');
                $category['route_keys'] = array_column($category['items'], 'key');
                $result[] = $category;
            }
        }
        return $result;
    }
}
