<?php

namespace Src\Domain\FilterOption\Models;


final class FilterOption
{
    /**
     * @var FilterOptionId|null
     */
    private ?FilterOptionId $filterOptionId;

    /**
     * @var FilterOptionId|null
     */
    private ?FilterOptionId $parentId;

    /**
     * @var int
     */
    private int $screenKey;

    /**
     * @var string
     */
    private string $label;

    /**
     * @var string
     */
    private string $value;

    /**
     * @var FilterOptionType
     */
    private FilterOptionType $type;

    /**
     * @var string|null
     */
    private ?string $sourceTable;

    /**
     * @var string|null
     */
    private ?string $sourceColumn;

    /**
     * @var int
     */
    private int $sortOrder;

    /**
     * @param FilterOptionId|null $filterOptionId
     * @param FilterOptionId|null $parentId
     * @param int $screenKey
     * @param string $label
     * @param string $value
     * @param FilterOptionType $type
     * @param string|null $sourceTable
     * @param string|null $sourceColumn
     * @param int $sortOrder
     */
    public function __construct(?FilterOptionId $filterOptionId, ?FilterOptionId $parentId, int $screenKey, string $label, string $value, FilterOptionType $type, ?string $sourceTable, ?string $sourceColumn, int $sortOrder)
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
     * @return FilterOptionId|null
     */
    public function getFilterOptionId(): ?FilterOptionId
    {
        return $this->filterOptionId;
    }

    /**
     * @return FilterOptionId|null
     */
    public function getParentId(): ?FilterOptionId
    {
        return $this->parentId;
    }

    /**
     * @return int
     */
    public function getScreenKey(): int
    {
        return $this->screenKey;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return FilterOptionType
     */
    public function getType(): FilterOptionType
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getSourceTable(): ?string
    {
        return $this->sourceTable;
    }

    /**
     * @return string|null
     */
    public function getSourceColumn(): ?string
    {
        return $this->sourceColumn;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }
}
