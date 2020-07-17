<?php


namespace App\Components\Dto\Input\Contact;


use Symfony\Component\Validator\Constraints as Assert;

final class CreateContactDto
{
    /**
     * @Assert\Regex(pattern="/^[+]?[0-9]{10,16}$/", message="Invalid phone number")
     */
    private string $phone;

    /**
     * @Assert\Email()
     */
    private string $email;

    private ?string $message;

    public function __construct(string $phone, string $email, ?string $message = null)
    {
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
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
