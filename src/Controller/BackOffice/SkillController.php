<?php
namespace App\Controller\BackOffice;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SkillController
 * @package App\Controller\BackOffice
 * @Route("/admin/skills")
 */
class SkillController extends AbstractController
{
   

    /**
     * @Route(name="skill_manage")
     * @param SkillRepository $skillRepository
     * @return Response
     */
    public function manage(SkillRepository $skillRepository): Response
    {
        $skills = $skillRepository->findAll();
        return $this->render("back-office/skill/manage.html.twig", [
            "skills" => $skills
        ]);
    }

    /**
     * @Route("/create", name="skill_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill)-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($skill); // ajout en BDD
            $this->getDoctrine()->getManager()->flush();    // modification de la BDD
            $this->addFlash("success", "la compétence à été ajoutée avec succès !");

            // toujours redirection après traitement d'un formulaire (obligatoire)
            return $this-> redirectToRoute("skill_manage");
        }

        return $this->render("back-office/skill/create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/update", name="skill_update")
     * @param skill $skill
     * @return Response
     */
    public function update(skill $skill, Request $request): Response
    {
        $form = $this->createForm(SkillType::class, $skill)-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();    // modification de la BDD
            $this->addFlash("success", "la compétence à été modifiée avec succès !");

            // toujours redirection après traitement d'un formulaire (obligatoire)
            return $this-> redirectToRoute("skill_manage");
        }

        return $this->render("back-office/skill/update.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/delete", name="skill_delete")
     * @param skill $skill
     * @return RedirectResponse
     */
    public function delete(skill $skill): RedirectResponse
    {
        $this->getDoctrine()->getManager()->remove($skill); // suppression en BDD
        $this->getDoctrine()->getManager()->flush();    // modification de la BDD
        $this->addFlash("success", "la compétence à été supprimée avec succès !");

        // toujours redirection après traitement d'un formulaire (obligatoire)
        return $this-> redirectToRoute("skill_manage");
    }
}
