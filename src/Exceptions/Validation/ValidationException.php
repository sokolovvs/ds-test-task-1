<?php


namespace App\Exceptions\Validation;


use App\Exceptions\ImproveException;
use Throwable;

class ValidationException extends ImproveException
{
    public function __construct(
        string $message = 'Validation error',
        $code = 0,
        ?Throwable $previous = null,
        array $errors = []
    ) {
        parent::__construct($message, $code, $previous, $errors);
    }
}
