<?php

namespace Src\Domain\MenuGroup\Snapshots;

use Src\Domain\MenuGroup\Models\MenuGroup;

class MenuGroupSnapshot
{
    /**
     * @var int
     */
    public int $menuGroupId;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string|null
     */
    public ?string $description;

    /**
     * @param int $menuGroupId
     * @param string $name
     * @param string|null $description
     */
    public function __construct(int $menuGroupId, string $name, ?string $description)
    {
        $this->menuGroupId = $menuGroupId;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @param MenuGroup $menuGroup
     * @return self
     */
    public static function fromArray(MenuGroup $menuGroup): self
    {
        return new self(
            menuGroupId: $menuGroup->getMenuGroupId()->getValue(),
            name: $menuGroup->getName(),
            description: $menuGroup->getDescription(),
        );
    }
}
