<?php


namespace App\Components\Contracts\Entity;


use App\Entity\Base\AbstractEntity;

interface CreatorInterface
{
    /**
     * @param $dto
     *
     * @return AbstractEntity
     */
    public function create($dto): AbstractEntity;
}
