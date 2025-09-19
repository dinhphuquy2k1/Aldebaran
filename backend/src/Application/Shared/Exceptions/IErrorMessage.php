<?php

namespace Src\Application\Shared\Exceptions;

interface IErrorMessage
{
    /**
     * @param string $key
     * @param string $message
     * @param int|null $index
     */
    public function __construct(string $key, string $message, int $index = null);

    /**
     * @return string
     */
    public function getKey(): string;

    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @return int|null
     */
    public function getIndex(): ?int;
}
