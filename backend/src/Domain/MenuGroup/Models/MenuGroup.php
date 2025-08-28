<?php

namespace Src\Domain\MenuGroup\Models;


final class MenuGroup
{
    /**
     * @var MenuGroupId|null
     */
    private ?MenuGroupId $menuGroupId;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string|null
     */
    private ?string $description;

    /**
     * @param MenuGroupId|null $menuGroupId
     * @param string $name
     * @param string|null $description
     */
    public function __construct(?MenuGroupId $menuGroupId, string $name, ?string $description)
    {
        $this->menuGroupId = $menuGroupId;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return MenuGroupId|null
     */
    public function getMenuGroupId(): ?MenuGroupId
    {
        return $this->menuGroupId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
