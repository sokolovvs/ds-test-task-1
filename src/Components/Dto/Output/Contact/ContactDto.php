<?php


namespace App\Components\Dto\Output\Contact;


class ContactDto
{
    private string $phone;

    private string $email;

    private ?string $message;

    private string $id;

    public function __construct(string $id, string $phone, string $email, ?string $message = null)
    {
        $this->id = $id;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
