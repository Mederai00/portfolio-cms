<?php
namespace App\Controller;

use App\Entity\Section;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
     /**
     * @Route("/", name="homepage", methods={"GET","HEAD"})
     */
    public function goHome(): Response
    {
        $sections = $this->getDoctrine()->getRepository(Section::class)->findAll();
        return $this->render('home.html.twig',[
         //   'sections' => $sections,
            'user' => $this->getUser()]
        );
    }
    /**
     * @Route("/alternate", name="alternate_page", methods={"GET","HEAD"})
     */
    public function alternatePage(): Response
    {
        return $this->render('alternate.html.twig');
    }
    /**
     * @Route("/single", name="single_blog", methods={"GET","HEAD"})
     */
    public function blogPage(): Response
    {
        return $this->render('single.html.twig');
    }
}