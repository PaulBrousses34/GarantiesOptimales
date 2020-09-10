<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Entity\Utilisateur;
use App\Form\NewsletterType;
use App\Repository\NewsletterRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/newsletter")
 */
class NewsletterController extends AbstractController
{


    /**
     * @Route("/new", name="newsletter_new", methods={"GET","POST"})
     */
    public function new(Request $request, MailerInterface $mailer, UtilisateurRepository $utilisateurRepository): Response
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);

        //$utilisateurNewsletter = $this->getDoctrine()->getRepository(UtilisateurRepository::class)->findByAgreeNewsletter(1);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $title = $newsletter->getTitle();
            $image = $newsletter->getImage();
            $content = $newsletter->getContent();
            $entityManager->persist($newsletter);
            $entityManager->flush();

        $utilisateurNewsletter = $utilisateurRepository->findByAgreeNewsletter(1);

        foreach ($utilisateurNewsletter as $utilisateurNews)
        {
            $emailUtilisateur = $utilisateurNews->getEmail();
            $firstnameUtilisateur = $utilisateurNews->getFirstname();
            $lastnameUtilisateur = $utilisateurNews->getLastname();


            $emailToSend = (new TemplatedEmail())

            ->from('newsletter@garanties-optimales.com')
            ->to($emailUtilisateur)
            ->subject($title)
            ->htmlTemplate('email/user/newsletter.html.twig')
            ->context([
                'subject' => $title,
                'content' => $content,
                'image' => $image,
                'firstname' => $firstnameUtilisateur,
                'lastname' => $lastnameUtilisateur,
            ]);
                
                    $mailer->send($emailToSend);
        }

            return $this->redirectToRoute('newsletter_index');
        }

        return $this->render('newsletter/new.html.twig', [
            'newsletter' => $newsletter,
            'form' => $form->createView(),
        ]);
    }


}
