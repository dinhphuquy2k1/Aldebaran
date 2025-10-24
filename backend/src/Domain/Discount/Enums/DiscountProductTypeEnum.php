<?php declare(strict_types=1);

namespace Src\Domain\Discount\Enums;

use BenSampo\Enum\Enum;

final class DiscountProductTypeEnum extends Enum
{
    const ALL = 0;
    const GROUP = 1;
    const PRODUCT = 2;
    const VARIANT = 3;
}
