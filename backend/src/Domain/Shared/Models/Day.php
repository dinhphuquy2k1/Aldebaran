<?php
declare(strict_types=1);

namespace Src\Domain\Shared\Models;

use InvalidArgumentException;
use Src\Domain\Shared\Enums\DayEnum;

final class Day
{
    private array $values = [
        DayEnum::MONDAY => 'monday',
        DayEnum::TUESDAY => 'tuesday',
        DayEnum::WEDNESDAY => 'wednesday',
        DayEnum::THURSDAY => 'thursday',
        DayEnum::FRIDAY => 'friday',
        DayEnum::SATURDAY => 'saturday',
        DayEnum::SUNDAY => 'sunday',
    ];

    /**
     * @var int
     */
    private int $value;

    /**
     * @var string $name
     */
    private string $name;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        if (!DayEnum::hasValue($value)) {
            throw new InvalidArgumentException($value . ' invalid.');
        }

        $this->value = $value;
        $this->name = $this->values[$value];
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
