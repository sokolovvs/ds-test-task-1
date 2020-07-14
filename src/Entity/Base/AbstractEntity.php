<?php


namespace App\Entity\Base;


use App\Components\Contracts\EqualsInterface;
use App\Components\Contracts\IdentityInterface;


abstract class AbstractEntity implements IdentityInterface, EqualsInterface
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param self $object
     *
     * @return bool
     */
    public function equals($object): bool
    {
        return $object->getId() === $this->getId();
    }

    /**
     * This method needs for compare objects in php arrays via standard functions
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getId();
    }

    public function getId(): ?string
    {
        return is_null($this->id) ? null : (string)$this->id;
    }
}
