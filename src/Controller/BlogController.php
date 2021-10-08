<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Form\BlogType;
use App\Repository\BlogRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(BlogRepository $repository): Response
    {
        $repository = $this->getDoctrine()->getRepository(Blog::class);
        $blog = $repository->findAll();

        return $this->render('blog/blog.html.twig', [
            'blog' =>$blog
        ]);
    }
       /**
     * @Route("/blogs", name="blogs")
     */
    public function client(BlogRepository $repository): Response
    {
        $repository = $this->getDoctrine()->getRepository(Blog::class);
        $blog = $repository->findAll();

        return $this->render('blog/blogs.html.twig', [
            'blogs' =>$blog
        ]);
    }
// Partie modifier 
    /**
     *  @Route("/blog/creation" , name="creer_article")
     * @Route("/modif_blog/{id}", name="modif_blog")
     */
    public function modifCreature(Blog $blog=null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$blog){
            $blog = new Blog(); 
        }
        $form = $this->createForm(BlogType::class, $blog);
        $form->handleRequest($request); 
        if($form->isSubmitted() && $form->isValid()){
            $modif = $blog->getId() !==null;
            $entityManager->persist($blog);
            $entityManager->flush();
            $this->addFlash("success", ($modif)?"La modification a été effectuer": "L'ajout de la creature a été effectuer"); // c est un if plus simple le ? va prendre la place du if et le : a else 
            return $this->redirectToRoute("blog");
        }
        return $this->render('blog/modifBlog.html.twig', [
            "blog" => $blog, 
            'form' =>  $form->createView(),
            "isModification" => $blog->getid() !==null


        ]);
    }

       /** 
     * @Route("/Blogsupr/{id}" , name="supprimer_blog" )
     */
    public function supprimerCreature(Blog $blog, Request $request, EntityManagerInterface $entityManager) : Response
    {
        if($this ->isCsrfTokenValid('SUP'.$blog->getId(), $request->get('_token'))){
            $entityManager->remove($blog);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuées ');
            return $this->redirectToRoute('blog');

        }
       

    }

}   
