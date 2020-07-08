<?php

namespace App\Controller;

use App\Entity\SousCategorie;
use App\Entity\Type;
use App\Repository\TypeRepository;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/particuliers", name="particuliers_")
*/
class ParticuliersController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategorieRepository $categoryRepository)
    {
        return $this->render('particuliers/index.html.twig', [
            'categorie' => $categoryRepository->findById(1),
        ]);
    }
    /**
     * @Route("/categorie/{slug}", name="categorie")
     */
    public function SubCategory(CategorieRepository $categoryRepository, SousCategorie $sousCategorie) {
        

        return $this->render('particuliers/sousCategories.html.twig', [
            'categorie' => $categoryRepository->findById(1),
            'sousCategories' => $sousCategorie,
        ]);

    }
}
