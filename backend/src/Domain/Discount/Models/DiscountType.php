<?php

namespace Src\Domain\Discount\Models;


use InvalidArgumentException;
use Src\Domain\Discount\Enums\DiscountTypeEnum;

class DiscountType
{
    /**
     * @var int
     */
    private int $typeId;

    /**
     * @param int $typeId
     */
    public function __construct(int $typeId)
    {
        if (!DiscountTypeEnum::hasValue($typeId)) {
            throw new InvalidArgumentException($typeId . ' invalid.');
        }

        $this->typeId = $typeId;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }
}
