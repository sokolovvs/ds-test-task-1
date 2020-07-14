<?php


namespace App\Controller\Api\Rest\V1\Contact;


use App\Components\BusinessLogic\TransactionScripts\Contact\CreateContactInteractor;
use App\Components\Dto\Input\Contact\CreateContactDto;
use App\Components\Serializer\Denormalizers\Contact\CreateContactDenormalizer;
use App\Controller\Api\Rest\Base\Crud\AbstractCreateController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateContactController extends AbstractCreateController
{
    public function __construct(CreateContactDenormalizer $denormalizer, CreateContactInteractor $interactor)
    {
        parent::__construct($denormalizer, $interactor);
    }

    /**
     * @Route("/api/v1/contact/", methods={"POST"})
     * @param Request $request
     * @param string  $dtoInputTarget
     *
     * @return JsonResponse
     */
    public function handle(Request $request, string $dtoInputTarget = CreateContactDto::class): JsonResponse
    {
        return parent::handle($request, $dtoInputTarget);
    }
}
