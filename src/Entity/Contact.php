<?php

namespace App\Entity;


use App\Entity\Base\AbstractEntity;
use App\Repository\ContactRepository;
use App\Traits\Doctrine\ORM\Entity\Id\UuidTrait;
use App\Traits\Doctrine\ORM\Entity\LifecycleCallback\CreatedAtTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 * @ORM\Table("contacts")
 * @ORM\HasLifecycleCallbacks()
 */
class Contact extends AbstractEntity
{
    use UuidTrait, CreatedAtTrait;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(min = 11, max = 20,
     *     minMessage = "Phone number value must be greater than 10 symbols",
     *     maxMessage = "Phone number value must be less than 21 symbols")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Phone number value must contains only numbers")
     */
    private string $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $message;

    public function __construct(string $phone, string $email, ?string $message = null)
    {
        parent::__construct(Uuid::uuid4());
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
