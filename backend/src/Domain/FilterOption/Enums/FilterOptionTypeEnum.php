<?php declare(strict_types=1);

namespace Src\Domain\FilterOption\Enums;

use BenSampo\Enum\Enum;

final class FilterOptionTypeEnum extends Enum
{
    const MULTISELECT = 'multiselect';
    const SELECT = 'select';
    const INPUT = 'input';
    const DATE = 'date';
    const GROUP = 'group';
}
