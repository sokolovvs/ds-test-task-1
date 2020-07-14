<?php


namespace App\Traits\Doctrine\ORM\Entity\LifecycleCallback;


use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait CreatedAtTrait
{
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\PrePersist()
     */
    public function createHandler(): void
    {
        $this->createdAt = new DateTime();
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }
}
