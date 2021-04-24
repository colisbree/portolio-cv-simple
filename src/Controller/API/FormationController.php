<?php
namespace App\Controller\API;

use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class FormationController
 * @package App\Controller\API
 * @Route("/api/formations")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("", methods={"GET"}, name="api-formations_collection_get" )
     * @param FormationRepository $formationRepository
     * @return JsonResponse
     */
    public function Collection(FormationRepository $formationRepository):JsonResponse
    {
        return $this->json($formationRepository->findAll());
    }
} 