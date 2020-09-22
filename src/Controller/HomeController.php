<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Newsletter;
use App\Form\ContactType;
use App\Repository\CategorieRepository;
use App\Repository\NewsletterRepository;
use App\Services\FileUploader;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET", "POST"})
     */
    public function index(CategorieRepository $categorieRepository,  NewsletterRepository $newsletterRepository, MailerInterface $mailer)
    {
        if(isset($_POST['meeting-time']) && isset($_POST['meeting-number'])) {

            $time = $_POST['meeting-time'];
            $number = $_POST['meeting-number'];
            $motif = $_POST['motif'];

            $emailToSend = (new TemplatedEmail())

            ->from('contact@garanties-optimales.com')
            ->to('contact@garanties-optimales.com')
            ->subject('Demande de rappel')
            ->htmlTemplate('email/contact/rappel.html.twig')
            ->context([
                'time' => $time,
                'number' => $number,
                'motif' => $motif,
            ]);

            $mailer->send($emailToSend);
            $this->addFlash(
                'success',
                'Votre demande de rappel a bien été envoyé. Nous vous rappellerons comme convenu'
            );
            
        }

        $newsletter = $newsletterRepository->findByLatest();
        $category = $categorieRepository->findAll();
        return $this->render('home/index.html.twig', [
            'category' => $category,
            'newsletters' => $newsletter,
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

        $secretKey = '6LfPCcsZAAAAABQAWP7uh8r4cQEiE_NJr9aRHXr_';
        $responseKey = $request->request->get('g-recaptcha-response');
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$responseKey.'&remoteip='.$userIP.'';
        $response = file_get_contents($url);

        $response = json_decode($response);

        if ($form->isSubmitted() && $form->isValid() && $response->success == true) {

            dump($response);
                    $email = $form->get('email')->getData();
                    $subject = $form->get('subject')->getData();
                    $message = $form->get('message')->getData();
                    $type = $form->get('type')->getData();
                    $nom = $form->get('lastname')->getData();
                    $prenom = $form->get('firstname')->getData();

                    $fileName = $fileUploader->saveFile($form['file'], 'assets/images/attachment');
            
            if (isset($fileName)) {
                        $file = file_get_contents('assets/images/attachment/'.$fileName.'');
   
                        $emailToSend = (new TemplatedEmail())

            ->from($email)
            ->to('contact@garanties-optimales.com')
            ->subject('Formulaire de contact')
            ->htmlTemplate('email/contact/send.html.twig')
            ->attach($file)
            ->context([
                'mail' => $email,
                'subject' => $subject,
                'message' => $message,
                'type' => $type,
                'nom' => $nom,
                'prenom' => $prenom
            ]);
                
                        $mailer->send($emailToSend);
                    } else {
                        $emailToSend = (new TemplatedEmail())

                ->from($email)
                ->to('contact@garanties-optimales.com')
                ->subject('Formulaire de contact')
                ->htmlTemplate('email/contact/send.html.twig')
                ->context([
                    'mail' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'nom' => $nom,
                    'prenom' => $prenom
                ]);
                    
                        $mailer->send($emailToSend);
                    }
                    $mailConfirm = (new TemplatedEmail())

            ->from('contact@garanties-optimales.com')
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
                        'Votre message a bien été envoyé, une confirmation par mail vous a été envoyé. Nous répondrons à votre demande dans les plus brefs délais'
                    );

                    return $this->redirectToRoute('home');


        } elseif ($form->isSubmitted() && $form->isValid()&& $response->success != true) {
            dump($response);
            $this->addFlash('error',
            'Problème de Captcha');
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
     * Method for the page legal mentions
     * @Route("/mentions-legales", name="legal_mentions")
     */
    public function legalMentions() {

        return $this->render('home/legalMentions.html.twig', [

            ]); 
    }

    /**
     * Method for the page legal mentions
     * @Route("/newsletter", name="newsletter_index", methods={"GET"})
     */
    public function newsletterIndex(NewsletterRepository $newsletterRepository) {


        $newsletters = $newsletterRepository->findAll();
        return $this->render('newsletter/index.html.twig', [
            'newsletters' => $newsletters,
            ]); 
    }

    /**
     * @Route("/newsletter/{id}", name="newsletter_show", methods={"GET"})
     */
    public function show(Newsletter $newsletter)
    {
        return $this->render('newsletter/show.html.twig', [
            'newsletter' => $newsletter,
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
