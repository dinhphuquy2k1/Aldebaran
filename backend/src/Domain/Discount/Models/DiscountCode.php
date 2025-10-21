<?php

namespace Src\Domain\Discount\Models;

use InvalidArgumentException;

final class DiscountCode
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!self::validate($value)) {
            throw new InvalidArgumentException($value . ' invalid.');
        }

        $this->value = $value;
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function validate(string $value): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
