<?php

namespace Src\Domain\Menu\Snapshots;


use Src\Domain\Menu\Models\Menu;
use Src\Domain\Shared\Snapshots\SnapshotHelper;

class MenuSnapshot
{
    /**
     * @var int
     */
    public int $menuId;

    /**
     * @var string
     */
    public string $label;

    /**
     * @var string|null
     */
    public ?string $icon;

    /**
     * @var MenuTypeSnapshot
     */
    public MenuTypeSnapshot $menuType;

    /**
     * @var string
     */
    public string $route;

    /**
     * @var int|null
     */
    public ?int $parentId;

    /**
     * @var int
     */
    public int $display;

    /**
     * @param int $menuId
     * @param string $label
     * @param string|null $icon
     * @param MenuTypeSnapshot $menuType
     * @param string $route
     * @param int|null $parentId
     * @param int $display
     */
    public function __construct(int $menuId, string $label, ?string $icon, MenuTypeSnapshot $menuType, string $route, ?int $parentId, int $display)
    {
        $this->menuId = $menuId;
        $this->label = $label;
        $this->icon = $icon;
        $this->menuType = $menuType;
        $this->route = $route;
        $this->parentId = $parentId;
        $this->display = $display;
    }

    /**
     * @param Menu $menu
     * @return self
     */
    public static function fromArray(Menu $menu): self
    {
        return new self(
            menuId: $menu->getMenuId()->getValue(),
            label: $menu->getLabel(),
            icon: $menu->getIcon(),
            menuType: SnapshotHelper::makeSnapshot(MenuTypeSnapshot::class, $menu->getMenuType()),
            route: $menu->getRoute(),
            parentId: $menu->getParentId()?->getValue(),
            display: $menu->getDisplay()
        );
    }
}
