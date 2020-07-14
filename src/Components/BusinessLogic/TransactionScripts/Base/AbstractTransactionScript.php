<?php


namespace App\Components\BusinessLogic\TransactionScripts\Base;


use App\Components\BusinessLogic\Interactors\InteractorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Throwable;

abstract class AbstractTransactionScript implements InteractorInterface
{
    private EntityManagerInterface $entityManager;

    private InteractorInterface $interactor;

    public function __construct(EntityManagerInterface $entityManager, InteractorInterface $interactor)
    {
        $this->entityManager = $entityManager;
        $this->interactor = $interactor;
    }

    public function execute($dto)
    {
        $this->entityManager->beginTransaction();

        try {
            $result = $this->interactor->execute($dto);
            $this->entityManager->flush();
            $this->entityManager->commit();

            return $result;
        } catch (Throwable $throwable) {
            $this->entityManager->rollback();
            throw $throwable;
        }
    }
}
