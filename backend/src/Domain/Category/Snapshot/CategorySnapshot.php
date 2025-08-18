<?php

namespace Src\Domain\Category\Snapshot;

use Src\Domain\Category\Models\Category;

class CategorySnapshot
{
    /**
     * @var int
     */
    public int $categoryId;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var ?int
     */
    public ?int $parentId;

    /**
     * @var ?string
     */
    public ?string $description;

    /**
     * @param int $categoryId
     * @param string $name
     * @param int|null $parentId
     * @param string|null $description
     */
    public function __construct(int $categoryId, string $name, ?int $parentId, ?string $description)
    {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->description = $description;
    }

    /**
     * @param Category $category
     * @return self
     */
    public static function fromArray(Category $category): self
    {
        return new self(
            categoryId: $category->getCategoryId()->getValue(),
            name: $category->getName(),
            parentId: $category->getParentId()?->getValue(),
            description: $category->getDescription(),
        );
    }
}
