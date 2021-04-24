<?php
namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller\FrontOffice
 * @Route("/", name="home")
 */
class HomeController extends AbstractController
{
    /**
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        return $this->render("front-office/home.html.twig");
    }
}