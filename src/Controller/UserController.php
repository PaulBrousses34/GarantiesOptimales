<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\DeleteType;
use App\Form\RegistrationFormType;
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
     * @Route("/profil/{lastname}", name="user_read", methods={"GET"})
     */
    public function read(Utilisateur $utilisateur)
    {
        $this->denyAccessUnlessGranted('READ', $utilisateur);

        return $this->render('user/read.html.twig', [
            'user' => $utilisateur,
        ]);
    }

         /**
     * Method to edit an existing account on the website
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/profil/edition/{lastname}", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Utilisateur $utilisateur, Request $request, MailerInterface $mailer, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->denyAccessUnlessGranted('EDIT', $utilisateur);
        

        $userForm = $this->createForm(RegistrationFormType::class, $utilisateur);

        $userForm->handleRequest($request);

            if ($userForm->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
              

                if ($userForm->isValid()){
                    $userPassword = $userForm->get('password')->getData();

                    // We modify the password only if the user modified it
                    if ($userPassword !== null) {
                        $utilisateur->setPassword($passwordEncoder->encodePassword($utilisateur, $userPassword));
                    }
                  
                    $em->flush();

                    $email = (new TemplatedEmail())
                      ->from('paul.brousses@gmail.com')
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
                    ]);
                } else {
                    $em->refresh($utilisateur);
                }
            }
            
        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('user_delete', ['lastname' => $utilisateur->getLastname()])
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
     * @Route("/profil/suppression/{lastname}", name="user_delete", methods={"DELETE"})
     */
    public function delete(EntityManagerInterface $em, MailerInterface $mailer, Request $request, Utilisateur $utilisateur)
    {
        
        $this->denyAccessUnlessGranted('DELETE', $utilisateur);

        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);

        if ($formDelete->isSubmitted() && $formDelete->isValid()) {

            //You have to clear the Session before deleting user entry in DB
            $currentUserId = $this->getUser()->getId();
            if ($currentUserId == $utilisateur->getId())
            {
              $session = $this->get('session');
              $session = new Session();
              $session->invalidate();
            }
            //Then remove the user
            $em->remove($utilisateur);
            $em->flush();

            // We create a request for send a email of confirmation

            $email = (new TemplatedEmail())
            ->from('paul.brousses@gmail.com')
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
        ]);
    }
}
