<?php


namespace App\Components\Creators\Contact;


use App\Components\Contracts\Entity\CreatorInterface;
use App\Components\Dto\Input\Contact\CreateContactDto;
use App\Entity\Base\AbstractEntity;
use App\Entity\Contact;

final class CreateContact implements CreatorInterface
{
    /**
     * @param CreateContactDto $dto
     *
     * @return Contact
     */
    public function create($dto): AbstractEntity
    {
        return new Contact($dto->getPhone(), $dto->getEmail(), $dto->getMessage());
    }
}
