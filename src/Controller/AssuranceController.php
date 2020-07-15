<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/assurance", name="assurances_")
*/
class AssuranceController extends AbstractController
{

    /**
     * @Route("/sous-categorie/{slug}", name="sous-categorie")
     */
    public function browseBySubCategory(SousCategorie $sousCategorie) {
        

        return $this->render('assurances/sous-categorie.html.twig', [
            'sousCategorie' => $sousCategorie,
        ]);

    }
}
