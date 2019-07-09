<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Form\PersonnageType;
use App\Repository\PersonnageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class PersoController extends AbstractController
{
    /**
     * Liste des personnages
     * @Route("/perso", name="perso")
     * @param PersonnageRepository $repository
     * @return Response
     */
    public function index(PersonnageRepository $repository): Response
    {
        $personnage = $repository->findAll();
        return $this->render('perso/index.html.twig', [
            'personnage' => $personnage
        ]);
    }

    /**
     * Affiche et créé une nouvelle carte
     * @Route("/perso/ajout", methods={"GET", "POST"})
     * @param Request $requestHTTP
     * @return Response
     */
    public function creationPerso(Request $requestHTTP): Response
    {
        $personnage = new Personnage();
        $formPerso = $this->createForm(PersonnageType::class, $personnage);
        $formPerso->handleRequest($requestHTTP);

        if ($formPerso->isSubmitted() && $formPerso->isValid()) {

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($personnage);
            $manager->flush();
            return $this->redirectToRoute('perso');
        }

        return $this->render('perso/ajout.html.twig', [
            'formPerso' => $formPerso->createView()
        ]);
    }

}
