<?php


namespace App\Controller\Api\Rest\V1\LocationInfo;


use App\Components\ExternalServices\GeoIP\GeoIPClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationByIpController extends AbstractController
{
    /**
     * @Route("/api/v1/self-location/", methods={"GET"})
     * @param Request              $request
     * @param GeoIPClientInterface $geoIPClient
     *
     * @return JsonResponse
     */
    public function handle(Request $request, GeoIPClientInterface $geoIPClient): JsonResponse
    {
        return $this->json($geoIPClient->getLocationInfoByIp($request->getClientIp()), Response::HTTP_OK);
    }
}
