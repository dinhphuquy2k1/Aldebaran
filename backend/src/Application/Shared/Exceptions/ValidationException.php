<?php

namespace Src\Application\Shared\Exceptions;

use Exception;

final class ValidationException extends Exception
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var IErrorMessage[]
     */
    private array $errorMessages;

    /**
     * ValidationException constructor.
     * @param array $errorMessages
     */
    public function __construct(array $errorMessages)
    {
        $this->title = 'Bad Request';
        $this->errorMessages = $errorMessages;
        parent::__construct();
    }

    /**
     * @return array
     */
    public function toResponseData(): array
    {
        $details = [];
        foreach ($this->errorMessages as $errorMessage) {
            $source = [
                'key' => $errorMessage->getKey(),
                'message' => $errorMessage->getMessage(),
            ];

            if (!is_null($errorMessage->getIndex())) {
                $source['index'] = $errorMessage->getIndex();
            }

            $details[] = $source;
        }

        return [
            'error' => [
                'title' => $this->title,
                'details' => $details,
            ]
        ];
    }
}
