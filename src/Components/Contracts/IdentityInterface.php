<?php


namespace App\Components\Contracts;


interface IdentityInterface
{
    /**
     * @return int|string
     */
    public function getId();

    /**
     * This method needs for compare objects in php arrays via standard functions
     *
     * @return string
     */
    public function __toString();
}
