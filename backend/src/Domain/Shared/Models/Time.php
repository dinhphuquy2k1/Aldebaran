<?php
declare(strict_types=1);

namespace Src\Domain\Shared\Models;

final class Time
{
    /**
     * @var string|null
     */
    private ?string $value;

    /**
     * @param string|null $value
     */
    public function __construct(?string $value = null)
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $from
     * @param string $to
     * @return false|int
     */
    public static function compare(string $from, string $to): false|int
    {
        $from = self::dbTime($from);
        $to = self::dbTime($to);

        if ((date_create($from) === false) || (date_create($to) === false)) {
            return false;
        }

        return $from <=> $to;
    }

    /**
     * @param string $value
     * @return string
     */
    public static function dbTime(string $value): string
    {
        if ($value === '') {
            return $value;
        }

        $value = str_replace('.', ':', $value);

        $result = date_create($value);

        if ($result === false) {
            return $value;
        }

        return date_format($result, 'H:i:s');
    }
}
