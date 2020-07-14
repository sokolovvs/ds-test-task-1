<?php


namespace App\Components\BusinessLogic\Interactors\Base;


use App\Components\BusinessLogic\Interactors\InteractorInterface;
use App\Components\Contracts\Entity\CreatorInterface;
use App\Components\Validation\Validator;
use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractCreateInteractor implements InteractorInterface
{
    protected CreatorInterface $creator;

    protected EntityManagerInterface $entityManager;

    protected Validator $validator;

    public function __construct(
        CreatorInterface $creator,
        EntityManagerInterface $entityManager,
        Validator $validator
    ) {
        $this->creator = $creator;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    public function execute($dto)
    {
        $this->validator->validate($dto);
        $entity = $this->creator->create($dto);
        $this->validator->validate($entity);
        $this->entityManager->persist($entity);

        return $entity;
    }
}
