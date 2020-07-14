<?php


namespace App\Traits\Doctrine\ORM\Entity\Id;


use Doctrine\ORM\Mapping as ORM;

trait UuidTrait
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    protected ?string $id;
}
