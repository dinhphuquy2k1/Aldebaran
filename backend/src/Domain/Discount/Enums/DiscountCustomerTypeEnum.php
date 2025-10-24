<?php declare(strict_types=1);

namespace Src\Domain\Discount\Enums;

use BenSampo\Enum\Enum;

final class DiscountCustomerTypeEnum extends Enum
{
    const ALL = 0;
    const GROUP = 1;
    const CUSTOMER = 2;
}
