<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Type;
use App\Repository\TypeRepository;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/", name="assurances_")
*/
class AssuranceController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Categorie $category)
    {
        return $this->render('assurances/index.html.twig', [
            'category' => $category,
        ]);
    }
    /**
     * @Route("/categorie/{slug}", name="categorie")
     */
    public function browseByCategory(Categorie $category) {
        

        return $this->render('assurances/categorie.html.twig', [
            'categorie' => $category,
        ]);

    }
    /**
     * @Route("/sous-categorie/{slug}", name="sous-categorie")
     */
    public function browseBySubCategory(SousCategorie $SousCategory) {
        

        return $this->render('assurances/sous-categorie.html.twig', [
            'sousCategorie' => $SousCategory,
        ]);

    }
}
