<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\Utilisateur;
use App\Form\DocumentType;
use App\Repository\DocumentRepository;
use App\Services\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/document")
 */
class DocumentController extends AbstractController
{

    /**
     *
     */
    public function index(DocumentRepository $documentRepository): Response
    {
        return $this->render('document/index.html.twig', [
            'documents' => $documentRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/nouveau", name="document_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader)
    {
        $document = new Document();
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            $document->setUtilisateur($this->getUser());

            $file = $fileUploader->saveFile($form['Fichier'], 'assets/images/attachment/tmp/');
            $document->setFichier($file);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Votre document a bien été ajouté.'
            );
   
            return $this->redirectToRoute('user_read', [
                'lastname' => $document->getUtilisateur()->getLastname(),
            ]);
        }

        return $this->render('document/new.html.twig', [
            'document' => $document,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="document_show", methods={"GET"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function show(Document $document): Response
    {
        $this->denyAccessUnlessGranted('READ', $document);
        
        return $this->render('document/show.html.twig', [
            'document' => $document,
        ]);
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/{id}", name="document_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Document $document): Response
    {
        $this->denyAccessUnlessGranted('DELETE', $document);
        if ($this->isCsrfTokenValid('delete'.$document->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($document);
            $entityManager->flush();
        }
        $this->addFlash(
            'success',
            'Votre document a bien été supprimé.'
        );

        return $this->redirectToRoute('user_read', [
            'lastname' => $document->getUtilisateur()->getLastname(),
        ]);
    }
}
