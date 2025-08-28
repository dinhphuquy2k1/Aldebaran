<?php declare(strict_types=1);

namespace Src\Domain\ProductGroup\Enums;

use BenSampo\Enum\Enum;

final class ProductGroupTypeEnum extends Enum
{
    const MANUAL = 0;
    const AUTO = 1;
}
