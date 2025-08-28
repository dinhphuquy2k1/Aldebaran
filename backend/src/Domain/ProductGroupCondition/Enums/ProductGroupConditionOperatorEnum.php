<?php declare(strict_types=1);

namespace Src\Domain\ProductGroupCondition\Enums;

use BenSampo\Enum\Enum;

final class ProductGroupConditionOperatorEnum extends Enum
{
    const ALL = 0;
    const ANY = 1;
}
