<?php
namespace App\Controller\BackOffice;

use App\Entity\Reference;
use App\Form\ReferenceType;
use App\Repository\ReferenceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * Class ReferenceController
 * @package App\Controller\BackOffice
 * @Route("/admin/references")
 */
class ReferenceController extends AbstractController
{
   

    /**
     * @Route(name="reference_manage")
     * @param ReferenceRepository $referenceRepository
     * @return Response
     */
    public function manage(ReferenceRepository $referenceRepository): Response
    {
        $references = $referenceRepository->findAll();
        return $this->render("back-office/reference/manage.html.twig", [
            "references" => $references
        ]);
    }

    /**
     * @Route("/create", name="reference_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $reference = new Reference();
        $form = $this->createForm(ReferenceType::class, $reference)-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($reference); // ajout en BDD
            $this->getDoctrine()->getManager()->flush();    // modification de la BDD
            $this->addFlash("success", "la référence à été ajoutée avec succès !");

            // toujours redirection après traitement d'un formulaire (obligatoire)
            return $this-> redirectToRoute("reference_manage");
        }

        return $this->render("back-office/reference/create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/update", name="reference_update")
     * @param reference $reference
     * @param Request $request
     * @return Response
     */
    public function update(reference $reference, Request $request): Response
    {
        $form = $this->createForm(ReferenceType::class, $reference)-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();    // modification de la BDD
            $this->addFlash("success", "la référence à été modifiée avec succès !");

            // toujours redirection après traitement d'un formulaire (obligatoire)
            return $this-> redirectToRoute("reference_manage");
        }

        return $this->render("back-office/reference/update.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/delete", name="reference_delete")
     * @param reference $reference
     * @return RedirectResponse
     */
    public function delete(reference $reference): RedirectResponse
    {
        $this->getDoctrine()->getManager()->remove($reference); // suppression en BDD
        $this->getDoctrine()->getManager()->flush();    // modification de la BDD
        $this->addFlash("success", "la référence à été supprimée avec succès !");

        // toujours redirection après traitement d'un formulaire (obligatoire)
        return $this-> redirectToRoute("reference_manage");
    }
}
