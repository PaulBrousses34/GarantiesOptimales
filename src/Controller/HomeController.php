<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\CategorieRepository;
use App\Services\FileUploader;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategorieRepository $categorieRepository)
    {

        $professionnels = $categorieRepository->findById(2);
        $particuliers = $categorieRepository->findById(1);
        return $this->render('home/index.html.twig', [
            'professionnels' => $professionnels,
            'particuliers' => $particuliers,
        ]);
    }

        /**
     * Method for the contact page
     * @Route("/contact-formulaire", name="contact_form", methods={"GET", "POST"})
     */
    public function contactForm(Request $request, MailerInterface $mailer, FileUploader $fileUploader)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $secretKey = '6Lf0kLIZAAAAAKiKKLwlbIs5Tg4e1We1qjQqEa13';
            $responseKey = $request->request->get('g-recaptcha-response');
            //$userIP = $_SERVER['REMOTE_ADDR'];

            $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$responseKey;//'&remoteip='.$userIP.'';
            $response = file_get_contents($url);

            $response = json_decode($response);

                    $email = $form->get('email')->getData();
                    $subject = $form->get('subject')->getData();
                    $message = $form->get('message')->getData();

                    $fileName = $fileUploader->saveFile($form['file'], 'assets/images/attachment');
            
            if (isset($fileName)) {
                        $file = file_get_contents('assets/images/attachment/'.$fileName.'');
   
                        $emailToSend = (new TemplatedEmail())

            ->from($email)
            ->to('paul.brousses@gmail.com')
            ->subject('Formulaire de contact')
            ->htmlTemplate('email/contact/send.html.twig')
            ->attach($file)
            ->context([
                'mail' => $email,
                'subject' => $subject,
                'message' => $message,
            ]);
                
                        $mailer->send($emailToSend);
                    } else {
                        $emailToSend = (new TemplatedEmail())

                ->from($email)
                ->to('paul.brousses@gmail.com')
                ->subject('Formulaire de contact')
                ->htmlTemplate('email/contact/send.html.twig')
                ->context([
                    'mail' => $email,
                    'subject' => $subject,
                    'message' => $message,
                ]);
                    
                        $mailer->send($emailToSend);
                    }
                    $mailConfirm = (new TemplatedEmail())

            ->from('paul.brousses@gmail.com')
            ->to($email)
            ->subject('Confirmation de votre demande de contact')
            ->htmlTemplate('email/contact/confirmation.html.twig')
            ->context([
                'subject' => $subject,
                'message' => $message,
            ]);

                    $mailer->send($mailConfirm);

                    $this->addFlash(
                        'success',
                        'Votre message a bien été envoyé.'
                    );

                    return $this->redirectToRoute('home');


        } 

        return $this->render('home/contact_form.html.twig', [
            'title'=>'Contact',
            'form' => $form->createView(),
        ]);

    }

    /**
     * Method for the page about us
     * @Route("/a-propos-de-nous", name="about-us")
     */
    public function aboutUs() {

        return $this->render('home/aboutUs.html.twig', [

        ]);
    }

    /**
     * Method for the page about us
     * @Route("/contact", name="contact")
     */
    public function contact() {

        return $this->render('home/contact.html.twig', [

        ]);
    }

    /**
     * Method for the page legal mentions
     * @Route("/mentions-legales", name="legal_mentions")
     */
    public function legalMentions() {

        return $this->render('home/legalMentions.html.twig', [

            ]); 
    }


    /**
     * 
     * @Route("/newsletter", name="newsletter")
     */
    public function Newsletter() {

        return $this->render('home/newsletter.html.twig', [

            ]);  
    }

    /**
     * 
     * @Route("/protection-des-donnees", name="protection")
     */
    public function Protection() {

        return $this->render('home/protectionDonnees.html.twig', [

            ]);         
    }

    /**
     * Method for the page about us
     * @Route("/conditions-generales-d'utilisation", name="cgu")
     */
    public function cgu() {

        return $this->render('home/cgu.html.twig', [

            ]);         
    }

    /**
     * Method for the page about us
     * @Route("/avis-clients", name="avis")
     */
    public function avis() {

        return $this->render('home/avis.html.twig', [

            ]);         
    }


}
