<?php

declare(strict_types=1);

namespace Src\Domain\Shared\Models;

use Carbon\Carbon;

final class Date
{
    const DEFAULT_START_DATE = '1910-01-01';
    const DEFAULT_END_DATE = '2100-12-31';

    const FORMAT_DATE_YMD = 'Y-m-d';

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
     * @param string|null $format
     * @return Date
     */
    public static function now(?string $format = 'Y-m-d H:i:s'): Date
    {
        return new self(date($format));
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     *
     * @param string $from
     * @param string $to
     * @return int|false
     * 0 if the dates are the same, a value greater than 0 if from is a greater date,
     *  Value less than 0 if from is a small date, false if from/to is an invalid date string
     */
    public static function compare(string $from, string $to): int|false
    {
        $from = self::dbDate($from);
        $to = self::dbDate($to);
        if ((date_create($from) === false) || (date_create($to) === false)) {
            return false;
        }

        return $from <=> $to;
    }

    /**
     * Convert date string to DB date string
     * @param string $value
     * @return string
     */
    public static function dbDate(string $value): string
    {
        if ($value === '') {
            return $value;
        }

        $value = str_replace('.', '-', $value);
        $value = str_replace('/', '-', $value);
        $result = date_create($value);
        if ($result === false) {
            return $value;
        }

        return date_format($result, 'Y-m-d');
    }

    /**
     * @param string $date
     * @return int
     */
    public static function dayOfWeekIso(string $date): int
    {
        return Carbon::parse(Date::dbDate($date))->dayOfWeekIso;
    }
}
