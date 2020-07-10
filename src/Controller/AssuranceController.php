<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/assurance", name="assurances_")
*/
class AssuranceController extends AbstractController
{

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
