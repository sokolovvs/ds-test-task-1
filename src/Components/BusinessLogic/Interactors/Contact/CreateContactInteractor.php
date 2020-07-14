<?php


namespace App\Components\BusinessLogic\Interactors\Contact;


use App\Components\BusinessLogic\Interactors\Base\AbstractCreateInteractor;
use App\Components\Creators\Contact\CreateContact;
use App\Components\Dto\Input\Contact\CreateContactDto;
use App\Components\Dto\Output\Contact\ContactDto;
use App\Components\Validation\Validator;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;

class CreateContactInteractor extends AbstractCreateInteractor
{
    public function __construct(
        CreateContact $creator,
        EntityManagerInterface $entityManager,
        Validator $validator
    ) {
        parent::__construct($creator, $entityManager, $validator);
    }

    /**
     * @param CreateContactDto $dto
     *
     * @return ContactDto
     */
    public function execute($dto)
    {
        /* @var $contact Contact */
        $contact = parent::execute($dto);

        return new ContactDto($contact->getId(), $contact->getPhone(), $contact->getEmail(), $contact->getMessage());
    }
}
