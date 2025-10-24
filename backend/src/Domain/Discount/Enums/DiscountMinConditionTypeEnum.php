<?php declare(strict_types=1);

namespace Src\Domain\Discount\Enums;

use BenSampo\Enum\Enum;

final class DiscountMinConditionTypeEnum extends Enum
{
    const NONE = 0;
    const ORDER_VALUE = 1;
    const QUANTITY = 2;
}
