<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\Utilisateur;
use App\Form\DeleteType;
use App\Form\RegistrationFormType;
use App\Form\SinistreType;
use App\Repository\DocumentRepository;
use App\Services\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{

    /**
     * Method to display the account page of the connected user
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/profil/{lastname}/{id}", name="user_read", methods={"GET"})
     */
    public function read(Utilisateur $utilisateur, DocumentRepository $documentRepository)
    {
        $this->denyAccessUnlessGranted('READ', $utilisateur);
    

        return $this->render('user/read.html.twig', [
            'user' => $utilisateur,
        ]);
    }

    /**
     * Method to edit an existing account on the website
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/profil/edition/{lastname}/{id}", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Utilisateur $utilisateur, Request $request, MailerInterface $mailer, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->denyAccessUnlessGranted('EDIT', $utilisateur);
        

        $userForm = $this->createForm(RegistrationFormType::class, $utilisateur);

        $userForm->handleRequest($request);

        if ($userForm->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
              

            if ($userForm->isValid()) {
                $userPassword = $userForm->get('password')->getData();

                // We modify the password only if the user modified it
                if ($userPassword !== null) {
                    $utilisateur->setPassword($passwordEncoder->encodePassword($utilisateur, $userPassword));
                }
                  
                $em->flush();

                $email = (new TemplatedEmail())
                      ->from('ne-pas-repondre@garanties-optimales.com')
                      ->to($utilisateur->getEmail())
                      ->subject('Votre profil a bien été modifié')
                      ->htmlTemplate('email/user/edit.html.twig')
                      ->context([
                            'username' => $utilisateur->getUsername(),
                        ]);
                
                $mailer->send($email);

                $this->addFlash(
                    'success',
                    'Votre compte a bien été modifié, un email de confirmation a été envoyé.'
                );

                return $this->redirectToRoute('user_read', [
                        'lastname' => $utilisateur->getLastname(),
                        'id' => $utilisateur->getId(),
                    ]);
            } else {
                $em->refresh($utilisateur);
            }
        }
            
        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('user_delete', ['lastname' => $utilisateur->getLastname(), 'id' => $utilisateur->getId()])
        ]);

        return $this->render('user/edit.html.twig', [
            'registrationForm' => $userForm->createView(),
            'deleteForm' => $formDelete->createView(),
            'title'=>'Modifier son profil',
            'user' => $this->getUser(),
        ]);
    }
    /**
     * Method to allow a user to delete his/her account on the website
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/profil/suppression/{lastname}/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(EntityManagerInterface $em, MailerInterface $mailer, Request $request, Utilisateur $utilisateur)
    {
        $this->denyAccessUnlessGranted('DELETE', $utilisateur);

        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);

        if ($formDelete->isSubmitted() && $formDelete->isValid()) {

            //You have to clear the Session before deleting user entry in DB
            $currentUserId = $this->getUser()->getId();
            if ($currentUserId == $utilisateur->getId()) {
                $session = $this->get('session');
                $session = new Session();
                $session->invalidate();
            }
            //Then remove the user
            $em->remove($utilisateur);
            $em->flush();

            // We create a request for send a email of confirmation

            $email = (new TemplatedEmail())
            ->from('ne-pas-repondre@garanties-optimales.com')
            ->to($utilisateur->getEmail())
            ->subject('Votre compte a bien été supprimé')
            ->htmlTemplate('email/user/delete.html.twig')
            ->context([
                        'username' => $utilisateur->getLastname(),
                    ]);
    
            $mailer->send($email);

            $this->addFlash(
                'success',
                'Votre compte a bien été supprimé.'
            );

            return $this->redirectToRoute('app_logout');
        }

        return $this->redirectToRoute('user_edit', [
            'lastname' => $utilisateur->getLastname(),
            'id' => $utilisateur->getId(),
        ]);
    }

    /**
     * Method to do declaration of sinistre
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/sinistre/{lastname}/{id}", name="user_sinistre", methods={"GET","POST"})
     */
    public function sinistre(Request $request, MailerInterface $mailer, FileUploader $fileUploader, Utilisateur $utilisateur)
    {
        $document = new Document();


        $formSinistre = $this->createForm(SinistreType::class);
        $formSinistre->handleRequest($request);

        if ($formSinistre->isSubmitted() && $formSinistre->isValid()) {


            $email = $_POST['email'];
            $firstname = $_POST['prenom'];
            $name = $_POST['nom'];
            $text = $formSinistre->get('message')->getData();
            $number = $formSinistre->get('numberContract')->getData();

            $fileConstat = $fileUploader->saveFile($formSinistre['constat'], 'assets/images/attachment/user/');
            


            $document->setUtilisateur($this->getUser());
            $document->setFichier($fileConstat);
            $document->setType('Constat');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush(); 


            if ($formSinistre['other']->getData() != null) {

                $type = $formSinistre->get('type')->getData();
                $document2 = New Document;
                $otherFile = $fileUploader->saveFile($formSinistre['other'], 'assets/images/attachment/user/');
                $document2->setUtilisateur($this->getUser());
                $document2->setFichier($otherFile);
                $document2->setType($type);
                $entityManager->persist($document2);
                $entityManager->flush();
            }

            $emailToSend = (new TemplatedEmail())

            ->from($email)
            ->to('sinistres@garanties-optimales.com')
            ->subject('Déclaration de sinistre')
            ->htmlTemplate('email/user/sinistre.html.twig')
            ->context([
                'name' => $name,
                'firstname' => $firstname,
                'number' => $number,
                'text' => $text,
            ]);

            $mailer->send($emailToSend);

            $mailConfirm = (new TemplatedEmail())

            ->from('sinistres@garanties-optimales.com')
            ->to($email)
            ->subject('Confirmation de votre declaration de sinistre')
            ->htmlTemplate('email/user/confirmation-sinistre.html.twig')
            ->context([
                'name' => $name,
                'firstname' => $firstname,
            ]);

                    $mailer->send($mailConfirm);

                    $this->addFlash(
                        'success',
                        'Votre déclaration a bien été envoyé une confirmation par mail vous a été envoyé. Nous traitons votre déclaration dans les plus brefs délais'
                    );


            return $this->redirectToRoute('user_read', [
                'lastname' => $utilisateur->getLastname(),
                'id' => $utilisateur->getId(),
            ]);
        }
        return $this->render('user/sinistre.html.twig', [
            'formSinistre' => $formSinistre->createView(),
        ]);
    }
}