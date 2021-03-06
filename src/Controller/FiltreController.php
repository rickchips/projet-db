<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Liens;
use App\Repository\CategorieRepository;
use App\Repository\LiensRepository;
use App\Repository\PersonnageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FiltreController extends AbstractController
{
    /**
     * @Route("/filtre", name="filtre")
     * @param LiensRepository $lienrepository
     * @param CategorieRepository
     * @param Request $resquest
     * @param PersonnageRepository $personnageRepository
     * @return Response
     */
    public function index(LiensRepository $lienrepository, Request $request, PersonnageRepository $personnageRepository, CategorieRepository $categorieRepository): Response
    {
        if ($request->isMethod('post')) {
            $posts = $request->request->all();
//            il faut recuperer les deux tableaux
            // On enleve x et y
            if (array_key_exists('x', $posts)) {
                unset($posts['x']);
            }
            if (array_key_exists('y', $posts)) {
                unset($posts['y']);
            }
            $persos = $personnageRepository->findAll();
            $persosOk = [];
//            $categorie = $categorieRepository->findAll();

            foreach ($persos as $perso) {
                $liens = $perso->getnomLiens();
                $liensOk = array_filter($liens->toArray(), function (Liens $elem) use ($posts) {
                    return in_array($elem->getId(), $posts);
                });
//                $categories = $perso->getNomCategorie();
//                $categorieOk = array_filter($categories->toArray(), function (Categorie $elem) use ($posts) {
//                    return in_array($elem->getId(), $posts);
//                });
                if (sizeof($liensOk) === sizeof($posts)) {
                    $persosOk[] = $perso;
                }
            }
//            var_dump($persosOk);
        }

        // Tri des persos
        $filter = $request->query->get('filter', 'nomLiens');
        if ($filter === 'nbKiLiens') {
            $orderBy = [
                'nbKiLiens' => 'DESC',
                'nomLiens' => 'ASC'
            ];
        } else {
            $orderBy = ['nomLiens' => 'ASC'];
        }

        return $this->render('filtre/index.html.twig', [
            'liens' => $lienrepository->findBy([], $orderBy),
            'personnages' => $persosOk ?? [],
            'categories' => $categorie ?? []
        ]);
    }



}

