<?php
namespace App\Controller\BackOffice;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class FormationController
 * @package App\Controller\BackOffice
 * @Route("/admin/formations")
 */
class FormationController extends AbstractController
{
   

    /**
     * @Route(name="formation_manage")
     * @param FormationRepository $formationRepository
     * @return Response
     */
    public function manage(FormationRepository $formationRepository): Response
    {
        $formations = $formationRepository->findAll();
        return $this->render("back-office/formation/manage.html.twig", [
            "formations" => $formations
        ]);
    }

    /**
     * @Route("/create", name="formation_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation)-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($formation); // ajout en BDD
            $this->getDoctrine()->getManager()->flush();    // modification de la BDD
            $this->addFlash("success", "la formation à été ajoutée avec succès !");

            // toujours redirection après traitement d'un formulaire (obligatoire)
            return $this-> redirectToRoute("formation_manage");
        }

        return $this->render("back-office/formation/create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/update", name="formation_update")
     * @param formation $formation
     * @return Response
     */
    public function update(formation $formation, Request $request): Response
    {
        $form = $this->createForm(FormationType::class, $formation)-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();    // modification de la BDD
            $this->addFlash("success", "la formation à été modifiée avec succès !");

            // toujours redirection après traitement d'un formulaire (obligatoire)
            return $this-> redirectToRoute("formation_manage");
        }

        return $this->render("back-office/formation/update.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/delete", name="formation_delete")
     * @param formation $formation
     * @return RedirectResponse
     */
    public function delete(formation $formation): RedirectResponse
    {
        $this->getDoctrine()->getManager()->remove($formation); // suppression en BDD
        $this->getDoctrine()->getManager()->flush();    // modification de la BDD
        $this->addFlash("success", "la formation à été supprimée avec succès !");

        // toujours redirection après traitement d'un formulaire (obligatoire)
        return $this-> redirectToRoute("formation_manage");
    }
}
