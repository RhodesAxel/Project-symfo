<?php

namespace App\Controller;

use App\Entity\NewsLetter;
use App\Form\InscriptionType;
use App\Repository\NewsLetterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsLetterController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('news_letter/home.html.twig');
    }

   /**
     *  @Route("/news_letter/creation" , name="creer_compte")
     * @Route("/modif_compte/{id}", name="modif_compte")
     */
    public function modifCompte(NewsLetter $inscr=null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$inscr){
            $inscr = new NewsLetter(); 
        }
        $form = $this->createForm(InscriptionType::class, $inscr);
        $form->handleRequest($request); 
        if($form->isSubmitted() && $form->isValid()){
            $modif = $inscr->getId() !==null;
            $entityManager->persist($inscr);
            $entityManager->flush();
            $this->addFlash("success", ($modif)?"La modification a été effectuer": "L'ajout de la creature a été effectuer"); // c est un if plus simple le ? va prendre la place du if et le : a else 
            return $this->redirectToRoute("merci");
        }
        return $this->render('news_letter/inscription.html.twig', [
            "compte" => $inscr, 
            'form' =>  $form->createView(),
            "isModification" => $inscr->getid() !==null


        ]);
    }

      /**
     * @Route("/news_letter/inscription", name="merci")
     */
    public function remreciment(): Response
    {
        return $this->render('news_letter/merci.html.twig', [
            
        ]);
    }

}
