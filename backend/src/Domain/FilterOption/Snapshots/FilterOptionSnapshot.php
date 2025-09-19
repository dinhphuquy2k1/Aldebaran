<?php

namespace Src\Domain\FilterOption\Snapshots;


use Src\Domain\FilterOption\Models\FilterOption;
use Src\Domain\Menu\Models\Menu;
use Src\Domain\Menu\Snapshots\MenuTypeSnapshot;
use Src\Domain\Shared\Snapshots\SnapshotHelper;

class FilterOptionSnapshot
{
    /**
     * @var int
     */
    public int $filterOptionId;

    /**
     * @var int|null
     */
    public ?int $parentId;

    /**
     * @var int
     */
    public int $screenKey;

    /**
     * @var string
     */
    public string $label;

    /**
     * @var string
     */
    public string $value;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var string|null
     */
    public ?string $sourceTable;

    /**
     * @var string|null
     */
    public ?string $sourceColumn;

    /**
     * @var int
     */
    public int $sortOrder;

    /**
     * @param int $filterOptionId
     * @param int|null $parentId
     * @param int $screenKey
     * @param string $label
     * @param string $value
     * @param string $type
     * @param string|null $sourceTable
     * @param string|null $sourceColumn
     * @param int $sortOrder
     */
    public function __construct(int $filterOptionId, ?int $parentId, int $screenKey, string $label, string $value, string $type, ?string $sourceTable, ?string $sourceColumn, int $sortOrder)
    {
        $this->filterOptionId = $filterOptionId;
        $this->parentId = $parentId;
        $this->screenKey = $screenKey;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->sourceTable = $sourceTable;
        $this->sourceColumn = $sourceColumn;
        $this->sortOrder = $sortOrder;
    }


    /**
     * @param FilterOption $filterOption
     * @return self
     */
    public static function fromArray(FilterOption $filterOption): self
    {
        return new self(
            filterOptionId: $filterOption->getFilterOptionId()->getValue(),
            parentId: $filterOption->getParentId()?->getValue(),
            screenKey: $filterOption->getScreenKey(),
            label: $filterOption->getLabel(),
            value: $filterOption->getValue(),
            type: $filterOption->getType()->getType(),
            sourceTable: $filterOption->getSourceTable(),
            sourceColumn: $filterOption->getSourceColumn(),
            sortOrder: $filterOption->getSortOrder(),
        );
    }
}
