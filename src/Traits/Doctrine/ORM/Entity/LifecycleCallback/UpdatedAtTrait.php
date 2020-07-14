<?php


namespace App\Traits\Doctrine\ORM\Entity\LifecycleCallback;


use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait UpdatedAtTrait
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\PreUpdate()
     */
    public function updateHandler(): void
    {
        $this->updatedAt = new DateTime();
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }
}
