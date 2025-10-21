<?php declare(strict_types=1);

namespace Src\Domain\Discount\Enums;

use BenSampo\Enum\Enum;

final class DiscountTypeEnum extends Enum
{
    const SHIPPING = 0;
    const PRODUCT = 1;
    const ORDER = 2;
}
