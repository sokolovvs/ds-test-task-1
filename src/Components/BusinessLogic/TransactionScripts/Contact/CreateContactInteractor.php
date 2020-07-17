<?php


namespace App\Components\BusinessLogic\TransactionScripts\Contact;


use App\Components\BusinessLogic\Interactors\Contact\CreateContactInteractor as CreatContact;
use App\Components\BusinessLogic\TransactionScripts\Base\AbstractTransactionScript;
use App\Components\Dto\Input\Contact\CreateContactDto;
use App\Components\Dto\Output\Contact\ContactDto;
use Doctrine\ORM\EntityManagerInterface;

class CreateContactInteractor extends AbstractTransactionScript
{
    public function __construct(
        CreatContact $interactor,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager, $interactor);
    }

    /**
     * @param CreateContactDto $dto
     *
     * @return ContactDto
     */
    public function execute($dto)
    {
        return parent::execute($dto);
    }
}
