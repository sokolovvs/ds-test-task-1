<?php


namespace App\Components\Errors\Http;


/**
 * Class HttpError
 * This class defines a "problem detail" as a way to carry machine-readable details of errors in a HTTP response
 * to avoid the need to define new error response formats for HTTP APIs.
 *
 * @package App\Components\Errors\Http
 * @link    https://tools.ietf.org/html/rfc7807 RFC7807
 */
class HttpError
{
    private string $type;

    private ?string $title;

    private ?int $status;

    private ?string $detail;

    private ?string $instance;

    private array $invalidParams;

    public function __construct(
        string $type,
        ?string $title = 'Error',
        ?int $status = 500,
        ?string $detail = null,
        ?string $instance = null,
        array $invalidParams = []
    ) {
        $this->type = $type;
        $this->title = $title;
        $this->status = $status;
        $this->detail = $detail;
        $this->instance = $instance;
        $this->invalidParams = $invalidParams;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function getInstance(): ?string
    {
        return $this->instance;
    }

    public function getInvalidParams(): array
    {
        return $this->invalidParams;
    }
}
