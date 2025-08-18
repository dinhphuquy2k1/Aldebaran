<?php

namespace Src\Domain\Category\Models;


final class Category
{
    /**
     * @var CategoryId|null
     */
    private ?CategoryId $categoryId;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var ?CategoryId
     */
    private ?CategoryId $parentId;

    /**
     * @var ?string
     */
    private ?string $description;

    /**
     * @param CategoryId|null $categoryId
     * @param string $name
     * @param CategoryId|null $parentId
     * @param string|null $description
     */
    public function __construct(?CategoryId $categoryId, string $name, ?CategoryId $parentId, ?string $description)
    {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->description = $description;
    }

    /**
     * @return CategoryId|null
     */
    public function getCategoryId(): ?CategoryId
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return CategoryId|null
     */
    public function getParentId(): ?CategoryId
    {
        return $this->parentId;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
