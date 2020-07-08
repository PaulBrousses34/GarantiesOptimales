<?php

namespace App\Controller;

use App\Entity\SousCategorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/professionnels", name="professionnels_")
*/
class ProfessionnelsController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategorieRepository $categoryRepository)
    {
        return $this->render('professionnels/index.html.twig', [
            'categorie' => $categoryRepository->findById(2),
        ]);
    }

    /**
     * @Route("/categorie/{slug}", name="categorie")
     */
    public function SubCategory(SousCategorie $sousCategorie, CategorieRepository $categoryRepository) {
        
        return $this->render('professionnels/sousCategories.html.twig', [
            'sousCategories' => $sousCategorie,
            'categorie' => $categoryRepository->findById(2),
        ]);

    }
}
