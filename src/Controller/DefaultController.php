<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_home")
     */
    public function home(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        $films = $entityManager->getRepository(Film::class)->findALL();
       
        return $this->render('default/home.html.twig', [
            'films' => $films
           
        ]);
    }#end function create()

   /**
     * @Route ("/ajouter-un-film.html", name="film_create", methods={"GET|POST"})
     */
    public function create (Request $request, EntityManagerInterface $entityManager ):Response
 {
    $film = new Film();
    $form = $this->createForm(FilmFormType::class, $film);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            //$form->get('salary')->getData();
            $entityManager->persist($film);
            $entityManager->flush();
            
            return $this->redirectToRoute('default_home');

        }

       
       
        return $this->render("film.html.twig", [
            "form_film" => $form->createView()
        ]);

 }


}
