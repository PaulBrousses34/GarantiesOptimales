<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Type;
use App\Form\ProfessionnelType;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use App\Repository\TypeRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/assurances", name="assurances_")
*/
class AssuranceController extends AbstractController
{

    /**
     * @Route("/categorie/{slug}", name="categorie")
     */
    public function browseByCategory(Categorie $categorie, CategorieRepository $categorieRepository) {
        

        $category = $categorieRepository->findById($categorie->getId());
        return $this->render('assurances/categorie.html.twig', [
            'categorie' => $categorie,
            'category' => $category,
        ]);

    }
    /**
     * @Route("/sous-categorie/{slug}", name="sous-categorie")
     */
    public function browseBySubCategory(SousCategorie $sousCategorie, SousCategorieRepository $SousCategorieRepository) {
        

        $particuliers = $SousCategorieRepository->findById($sousCategorie->getId());
        return $this->render('assurances/sous-categorie.html.twig', [
            'sousCategorie' => $sousCategorie,
            'particuliers' => $particuliers,
        ]);

    }

    /**
     * @Route("/type/{slug}", name="type")
     */
    public function browseByType(Type $type, TypeRepository $typeRepository) {
        
        $sousCategorie = $type->getSousCategorie();
        $particuliers = $typeRepository->findById($type->getId());
        return $this->render('assurances/type.html.twig', [
            'type' => $type,
            'particuliers' => $particuliers,
            'sousCategorie' => $sousCategorie,
        ]);

    }

    /**
     * @Route("/demande-devis", name="devis_add", methods={"GET","POST"})
     */
   public function askDevis(Request $request, MailerInterface $mailer)
    {
        

        $form = $this->createForm(ProfessionnelType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            

            $email = (new TemplatedEmail())
            ->from()
            ->to()
            ->subject('')
            ->htmlTemplate('email/devis/add.html.twig')
            ->context([
                
            ]);
    
            $mailer->send($email);

            $this->addFlash(
                'success',
                'Votre demande de devis a été effectué avec succés'
            );

            return $this->redirectToRoute('home', [
                
                ]);
        }

        return $this->render('assurances/formulaire-devis.html.twig', [
            
            'proForm' => $form->createView(),
            
        ]);
    }



    /**
     * @Route("/devis", name="devis_iframe")
     */
   public function iframeDevis(Request $request)
   {


    return $this->render('iframe/devis.html.twig', [
            

        
    ]);


   }

}
