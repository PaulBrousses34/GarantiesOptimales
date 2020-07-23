<?php

namespace App\Controller;

use App\Entity\SousCategorie;
use App\Entity\Type;
use App\Repository\SousCategorieRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/assurances", name="assurances_")
*/
class AssuranceController extends AbstractController
{

    /**
     * @Route("/particuliers/categorie/{slug}", name="sous-categorie_particuliers")
     */
    public function browseBySubCategoryPart(SousCategorie $sousCategorie, SousCategorieRepository $SousCategorieRepository) {
        

        $particuliers = $SousCategorieRepository->findById($sousCategorie->getId());
        return $this->render('assurances/particuliers/sous-categorie.html.twig', [
            'sousCategorie' => $sousCategorie,
            'particuliers' => $particuliers,
        ]);

    }

    /**
     * @Route("/particuliers/type/{slug}", name="type_particuliers")
     */
    public function browseByTypePart(Type $type, TypeRepository $typeRepository) {
        
        $sousCategorie = $type->getSousCategorie();
        $particuliers = $typeRepository->findById($type->getId());
        return $this->render('assurances/particuliers/type.html.twig', [
            'type' => $type,
            'particuliers' => $particuliers,
            'sousCategorie' => $sousCategorie,
        ]);

    }

    /**
     * @Route("/professionnels/categorie/{slug}", name="sous-categorie_professionnels")
     */
    public function browseBySubCategoryPro(SousCategorie $sousCategorie, SousCategorieRepository $SousCategorieRepository) {
        

        $professionnels = $SousCategorieRepository->findById($sousCategorie->getId());
        return $this->render('assurances/professionnels/sous-categorie.html.twig', [
            'sousCategorie' => $sousCategorie,
            'professionnels' => $professionnels,
        ]);

    }

    /**
     * @Route("/professionnels/type/{slug}", name="type_professionnels")
     */
    public function browseByTypePro(Type $type, TypeRepository $typeRepository) {
        
        $sousCategorie = $type->getSousCategorie();
        $professionnels = $typeRepository->findById($type->getId());
        return $this->render('assurances/professionnels/type.html.twig', [
            'type' => $type,
            'professionnels' => $professionnels,
            'sousCategorie' => $sousCategorie,
        ]);

    }
}
