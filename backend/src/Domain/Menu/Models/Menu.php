<?php

namespace Src\Domain\Menu\Models;


use Src\Domain\Menu\Snapshots\MenuTypeSnapshot;
use Src\Domain\MenuGroup\Models\MenuGroup;

final class Menu
{
    /**
     * @var MenuId|null
     */
    private ?MenuId $menuId;

    /**
     * @var string
     */
    private string $label;

    /**
     * @var string|null
     */
    private ?string $icon;

    /**
     * @var MenuType
     */
    private MenuType $menuType;

    /**
     * @var string
     */
    private string $route;

    /**
     * @var MenuId|null
     */
    private ?MenuId $parentId;

    /**
     * @var int
     */
    private int $display;

    /**
     * @param MenuId|null $menuId
     * @param string $label
     * @param string|null $icon
     * @param MenuType $menuType
     * @param string $route
     * @param MenuId|null $parentId
     * @param int $display
     */
    public function __construct(?MenuId $menuId, string $label, ?string $icon, MenuType $menuType, string $route, ?MenuId $parentId, int $display)
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
     * @return MenuId|null
     */
    public function getMenuId(): ?MenuId
    {
        return $this->menuId;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return MenuType
     */
    public function getMenuType(): MenuType
    {
        return $this->menuType;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return MenuId|null
     */
    public function getParentId(): ?MenuId
    {
        return $this->parentId;
    }

    /**
     * @return int
     */
    public function getDisplay(): int
    {
        return $this->display;
    }

    /**
     * @return MenuTypeSnapshot
     */
    public function menuTypeSnapshot(): MenuTypeSnapshot
    {
        return MenuTypeSnapshot::fromArray($this->menuType);
    }
}
