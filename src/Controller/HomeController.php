<?php
namespace App\Controller;

use App\Entity\Section;
use App\Entity\Block;
use App\Entity\Blog;
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
        $blocks = $this->getDoctrine()->getRepository(Block::class)->findAll();
        $blogs = $this->getDoctrine()->getRepository(Blog::class)->findAll();

        return $this->render('home.html.twig',[
            'sections' => $sections,
            'blocks' => $blocks,
            'blogs' => $blogs,
            'user' => $this->getUser()]
        );
    }

    /**
     * @Route("/home", methods={"GET","HEAD"})
     */
    public function homealt(): Response
    {
        return $this->redirectToRoute('homepage');

    }
    
    /**
     * @Route("/single/{id}", name="single_blog", methods={"GET","HEAD"})
     */
    public function blogPage(Blog $blog): Response
    {
        return $this->render('single.html.twig', [
            'blog' => $blog,
        ]);
    }

    /**
     * @Route("/admin", methods={"GET","HEAD"})
     */
    public function admin(): Response
    {
        return $this->redirectToRoute('section_index');

    }



    
}