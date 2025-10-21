<?php declare(strict_types=1);

namespace Src\Domain\Shared\Enums;

use BenSampo\Enum\Enum;

final class DayEnum extends Enum
{
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;
    const SUNDAY = 7;
}
