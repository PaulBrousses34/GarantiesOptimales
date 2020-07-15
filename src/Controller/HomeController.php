<?php

namespace App\Controller;


use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategorieRepository $categorieRepository)
    {

        $professionnels = $categorieRepository->findById(1);
        $particuliers = $categorieRepository->findById(2);
        return $this->render('home/index.html.twig', [
            'professionnels' => $professionnels,
            'particuliers' => $particuliers,
        ]);
    }
}
