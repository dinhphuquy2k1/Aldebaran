<?php

namespace Src\Domain\Menu\Snapshots;

use Src\Domain\Menu\Models\Menu;
use Src\Domain\Menu\Models\MenuType;

class MenuTypeSnapshot
{
    /**
     * @var int
     */
    public int $menuTypeId;

    /**
     * @var string
     */
    public string $menuTypeName;

    /**
     * @param int $menuTypeId
     * @param string $menuTypeName
     */
    public function __construct(int $menuTypeId, string $menuTypeName)
    {
        $this->menuTypeId = $menuTypeId;
        $this->menuTypeName = $menuTypeName;
    }

    /**
     * @param MenuType $menuType
     * @return self
     */
    public static function fromArray(MenuType $menuType): self
    {
        return new self(
            menuTypeId: $menuType->getTypeId(),
            menuTypeName: $menuType->getTypeName()
        );
    }
}
