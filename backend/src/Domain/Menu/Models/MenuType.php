<?php

namespace Src\Domain\Menu\Models;


use InvalidArgumentException;
use Src\Domain\Court\Enums\CourtTypeEnum;
use Src\Domain\Menu\Enums\MenuTypeEnum;

class MenuType
{
    /**
     * @var int
     */
    private int $typeId;

    /**
     * @var string
     */
    private string $typeName;

    /**
     * @var array
     */
    private array $values = [
        MenuTypeEnum::ADMIN => 'admin',
    ];

    /**
     * @param int $typeId
     */
    public function __construct(int $typeId)
    {
        if (!MenuTypeEnum::hasValue($typeId)) {
            throw new InvalidArgumentException($typeId . ' invalid.');
        }

        $this->typeId = $typeId;
        $this->typeName = $this->values[$typeId];
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->typeName;
    }
}
