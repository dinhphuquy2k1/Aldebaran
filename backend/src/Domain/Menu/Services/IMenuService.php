<?php

declare(strict_types=1);

namespace Src\Domain\Menu\Services;


use Src\Domain\Menu\Snapshots\MenuSnapshot;

interface IMenuService
{
    /**
     * @param array $filters
     * @return MenuSnapshot[]
     */
    public function getRecursiveMenus(array $filters = []): array;
}
