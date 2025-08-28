<?php declare(strict_types=1);

namespace Src\Domain\ProductGroup\Enums;

use BenSampo\Enum\Enum;

final class ProductGroupConditionModeEnum extends Enum
{
    const ALL = 0;
    const ANY = 1;
}
