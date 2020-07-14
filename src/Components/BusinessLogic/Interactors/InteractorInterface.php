<?php


namespace App\Components\BusinessLogic\Interactors;


interface InteractorInterface
{
    /**
     * @param $dto
     *
     * @return mixed
     */
    public function execute($dto);
}
