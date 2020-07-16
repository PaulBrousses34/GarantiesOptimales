<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\CategorieRepository;
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

        $professionnels = $categorieRepository->findById(1);
        $particuliers = $categorieRepository->findById(2);
        return $this->render('home/index.html.twig', [
            'professionnels' => $professionnels,
            'particuliers' => $particuliers,
        ]);
    }

        /**
     * Method for the contact page
     * @Route("/contact", name="contact", methods={"GET", "POST"})
     */
    public function contact(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);


      
        if ($form->isSubmitted() && $form->isValid() ) {
           
        
            $email = $form->get('email')->getData(); 
            $subject = $form->get('subject')->getData();
            $message = $form->get('message')->getData(); 
            
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

            return $this->redirectToRoute('main_home');
        }

        return $this->render('home/contact.html.twig', [
            'title'=>'Contact',
            'form' => $form->createView(),
        ]);

    }
  
}
