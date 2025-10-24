<?php

namespace Src\Domain\DiscountRegion\Models;

use InvalidArgumentException;

final class DiscountRegionId
{
    /**
     * @var int
     */
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        if (!self::validate($value)) {
            throw new InvalidArgumentException($value . ' invalid.');
        }
        $this->value = $value;
    }

    /**
     * @param int $value
     * @return bool
     */
    public static function validate(int $value): bool
    {
        if ($value === 0) {
            return false;
        }
        return true;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
