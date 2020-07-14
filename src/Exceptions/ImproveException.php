<?php


namespace App\Exceptions;


use Exception;
use Throwable;

class ImproveException extends Exception
{
    /**
     * Keys - error aggregations, values - messages
     *
     * @var array
     */
    private array $errors;

    public function __construct(
        string $message = 'Error',
        $code = 0,
        ?Throwable $previous = null,
        array $errors = []
    ) {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public static function fromMessageAndErrors(
        string $message = 'Error',
        array $errors = []
    ): self {
        return new static($message, 0, null, $errors);
    }

    public static function fromMessage(
        string $message = 'Error'
    ): self {
        return new static($message);
    }

    public static function fromErrors(
        array $errors = []
    ): self {
        return new static('Error', 0, null, $errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
