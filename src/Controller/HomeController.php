<?php
namespace App\Controller;

use App\Entity\Section;
use App\Entity\Block;
use App\Entity\Blog;
use App\Repository\BlockRepository;
use App\Repository\BlogRepository;
use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $sections;
    private $blocks;
    private $blogs;
    private $manager;

    public function __construct(EntityManagerInterface $entityManagerInterface, SectionRepository $sectionRepository,BlockRepository $blockRepository, BlogRepository $blogRepository)
    {
        $this->sections = $sectionRepository->findAll();
        $this->blocks = $blockRepository->findAll();
        $this->blogs = $blogRepository->findAll();
        $this->manager = $entityManagerInterface;
    }

     /**
     * @Route("/", name="homepage", methods={"GET","HEAD"})
     */
    public function goHome(SectionRepository $sectionRepository): Response
    {
        // $this->sections = $sectionRepository->findBy(['titre'=>'chi 7aja']);
        // $this->sections = $sectionRepository->findBy(['blocks'=>$testO]);
        // $id = 12;
        // $testArrayCollection = new ArrayCollection($sectionRepository->findAll());
        // $testArrayCollection->filter(function(Section $section) use ($id){
        //     if(
        //         $section->getId() == $id
        //     )
        //         dump(
        //             $section
        //         );
        // });
        // dd();


        return $this->render('home.html.twig',[
            'sections' => $this->sections,
            'blocks' => $this->blocks,
            'blogs' => $this->blogs,
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