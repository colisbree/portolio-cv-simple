<?php
namespace App\Controller\API;

use App\Repository\ReferenceRepository;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * class ReferenceController
 * @package App\Controller\API
 * @Route("/api/references")
 */
class ReferenceController 
{
    /**
     * @Route("", methods={"GET"}, name="api-references_collection_get" )
     * @param ReferenceRepository $referenceRepository
     * @param SerializerInterface $Serializer
     * @return JsonResponse
     */
    public function Collection(ReferenceRepository $referenceRepository, SerializerInterface $Serializer):JsonResponse
    {
        return new JsonResponse($Serializer->serialize($referenceRepository->findAll(), 'json', ['groups' => 'get']),
        200, 
        [], 
        true
        );
    }
}
