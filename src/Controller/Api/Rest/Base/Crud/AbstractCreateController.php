<?php


namespace App\Controller\Api\Rest\Base\Crud;


use App\Components\BusinessLogic\TransactionScripts\Base\AbstractTransactionScript;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractCreateController extends AbstractController
{
    protected DenormalizerInterface $denormalizer;

    protected AbstractTransactionScript $interactor;

    public function __construct(
        DenormalizerInterface $denormalizer,
        AbstractTransactionScript $interactor
    ) {
        $this->denormalizer = $denormalizer;
        $this->interactor = $interactor;
    }

    public function handle(
        Request $request,
        string $dtoInputTarget
    ): JsonResponse {
        $serializer = new Serializer([$this->denormalizer]);

        return $this->json(
            $this->interactor->execute(
                $serializer->denormalize($request, $dtoInputTarget)
            ), Response::HTTP_CREATED,
        );
    }
}
