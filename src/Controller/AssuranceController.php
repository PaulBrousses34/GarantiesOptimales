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
            
            $formeJuridique = $form->get('formeJuridique')->getData();
            $societe = $form->get('societe')->getData();
            $siren = $form->get('siren')->getData();
            $nom = $form->get('nom')->getData();
            $adresse = $form->get('adresse')->getData();
            $complementAdresse = $form->get('complementAdresse')->getData();
            $codePostal = $form->get('codePostal')->getData();
            $ville = $form->get('ville')->getData();
            $telephone = $form->get('telephone')->getData();
            $dateCreation = $form->get('dateCreation')->getData();
            $ca = $form->get('CA')->getData();
            $ape = $form->get('APE')->getData();
            $message = $form->get('message')->getData();
            $adresseMail = $form->get('adresseMail')->getData();

            $email = (new TemplatedEmail())
            ->from($adresseMail)
            ->to('devis@garanties-optimales.com')
            ->subject('Demande de devis')
            ->htmlTemplate('email/devis/add.html.twig')
            ->context([
                'formeJuridique' => $formeJuridique,
                'societe' => $societe,
                'siren' => $siren,
                'nom' => $nom,
                'adresse' => $adresse,
                'complementAdresse' => $complementAdresse,
                'codePostal' => $codePostal,
                'ville' => $ville,
                'telephone' => $telephone,
                'dateCreation' => $dateCreation,
                'ca' => $ca,
                'ape' => $ape,
                'adresseMail' => $adresseMail,
                'message' => $message,
                
            ]);
    
            $mailer->send($email);

            $this->addFlash(
                'success',
                'Votre demande de devis a été effectué avec succés nous vous répondrons sous 24h'
            );

            return $this->redirectToRoute('home', [
                
                ]);
        }

        return $this->render('assurances/formulaire-devis.html.twig', [
            
            'proForm' => $form->createView(),
            
        ]);
    }



    /**
     * @Route("/devis/plaisance", name="devis_plaisance")
     */
   public function iframePlaisance()
   {
       return $this->render('iframe/plaisance.html.twig', [
            
    ]);
   }
        /**
     * @Route("/devis/sante", name="devis_sante")
     */
   public function iframeSante()
   {

    return $this->render('iframe/sante.html.twig', [
            
    ]);


   }
   

       /**
     * @Route("/plaisance/protection-juridique", name="protection_juridique_nautique")
     */
    public function pjNautique()
    {
        
       
     return $this->render('partials/types/protection-juridique-nautique.html.twig', [

     ]);
 
 
    }

    /**
     * @Route("/plaisance/remorque", name="remorque_nautique")
     */
    public function remorqueNautique()
    {
 
     return $this->render('partials/types/remorque.html.twig', [
             
     ]);
 
 
    }

    /**
     * @Route("/plaisance/assistance", name="assistance_nautique")
     */
    public function assistanceNautique()
    {
 
     return $this->render('partials/types/assistance.html.twig', [
             
     ]);
 
 
    }


    /**
     * @Route("/plaisance/sports-nautiques", name="sports_nautique")
     */
    public function sportsNautique()
    {
 
     return $this->render('partials/types/sports-nautiques.html.twig', [
             
     ]);
 
 
    }


    /**
     * @Route("/devis/auto", name="devis_auto")
     */
   public function iframeAuto()
   {

    return $this->render('iframe/auto.html.twig', [
            
    ]);


   }

   /**
     * @Route("/devis/cyclo", name="devis_cyclo")
     */
    public function iframeCyclo()
    {
 
     return $this->render('iframe/cyclo.html.twig', [
             
     ]);
 
 
    }

       /**
     * @Route("/devis/chien-chat", name="devis_chien-chat")
     */
    public function iframeChienChat()
    {
 
     return $this->render('iframe/chien-chat.html.twig', [
             
     ]);
 
 
    }

    /**
     * @Route("/devis/habitation", name="devis_habitation")
     */
    public function iframeHabitation()
    {
 
     return $this->render('iframe/habitation.html.twig', [
             
     ]);
 
 
    }


    /**
     * @Route("/devis/auto-temporaire", name="devis_auto-temporaire")
     */
    public function iframeTemporaire()
    {
 
     return $this->render('iframe/temporaire.html.twig', [
             
     ]);
 
 
    }

    /**
     * @Route("/devis/camping-car", name="devis_camping-car")
     */
    public function iframeCampingCar()
    {
 
     return $this->render('iframe/camping-car.html.twig', [
             
     ]);
 
 
    }

    /**
     * @Route("/devis/moto", name="devis_moto")
     */
    public function iframeMoto()
    {
 
     return $this->render('iframe/moto.html.twig', [
             
     ]);
 
 
    }

}
