<?php


namespace App\Traits\Doctrine\ORM\Entity\Id;


use Doctrine\ORM\Mapping as ORM;

trait AutoIncrementIdTrait
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected ?int $id;
}
