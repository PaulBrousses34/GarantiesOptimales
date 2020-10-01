<?php

namespace App\Controller\Admin;

use App\Controller\HomeController;
use App\Entity\Categorie;
use App\Entity\Document;
use App\Entity\Newsletter;
use App\Entity\SousCategorie;
use App\Entity\Type;
use App\Entity\Utilisateur;
use App\Repository\DocumentRepository;
use App\Repository\UtilisateurRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{


    protected $utilisateurRepository;

    public function __construct(UtilisateurRepository $utilisateurRepository, DocumentRepository $documentRepository) {
       $this->utilisateurRepository = $utilisateurRepository;
       $this->documentRepository = $documentRepository;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        //return $this->redirect($routeBuilder->setController(DocumentCrudController::class)->generateUrl());
        
        return $this->render('bundles/EasyAdminBundle/views/welcome.html.twig',
        ['countAllUser' => $this->utilisateurRepository->countAllUtilisateur() ,
        'countAllDocuments' => $this->documentRepository->countAllDocuments() ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garanties Optimales')
            ->setFaviconPath('assets/images/favicon.ico');
    }
    
    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addCssFile('build/admin.css');
    }

    public function configureMenuItems(): iterable
    {
        return [



            MenuItem::linkToCrud('Categories', 'fas fa-clone', Categorie::class),
            MenuItem::linkToCrud('Sous Categories', 'far fa-clone', SousCategorie::class),
            MenuItem::linkToCrud('Type', 'fa fa-tags', Type::class),

            MenuItem::linkToCrud('Utilisateurs', 'fas fa-at', Utilisateur::class),
            MenuItem::linkToCrud('Documents', 'fa fa-file-text', Document::class),

            MenuItem::linkToCrud('Newsletter', 'far fa-newspaper', Newsletter::class),

        ];
    }
}
