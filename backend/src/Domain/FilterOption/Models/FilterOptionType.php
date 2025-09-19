<?php

namespace Src\Domain\FilterOption\Models;


use InvalidArgumentException;
use Src\Domain\FilterOption\Enums\FilterOptionTypeEnum;

class FilterOptionType
{
    /**
     * @var string
     */
    private string $type;


    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        if (!FilterOptionTypeEnum::hasValue($type)) {
            throw new InvalidArgumentException($type . ' invalid.');
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
