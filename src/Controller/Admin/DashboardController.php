<?php

namespace App\Controller\Admin;

use App\Controller\HomeController;
use App\Entity\Categorie;
use App\Entity\Document;
use App\Entity\Newsletter;
use App\Entity\SousCategorie;
use App\Entity\Type;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        return $this->redirect($routeBuilder->setController(DocumentCrudController::class)->generateUrl());
        
        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garanties Optimales');
    }

    public function configureMenuItems(): iterable
    {
        return [


            MenuItem::section('Produits'),
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Categorie::class),
            MenuItem::linkToCrud('Sous Categories', 'fa fa-file-text', SousCategorie::class),
            MenuItem::linkToCrud('Type', 'fa fa-tags', Type::class),


            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', Utilisateur::class),
            MenuItem::linkToCrud('Documents', 'fa fa-file-text', Document::class),


            MenuItem::section('Actualités'),
            MenuItem::linkToCrud('Newsletter', 'fa fa-file-text', Newsletter::class),

            MenuItem::linkToLogout('Logout', 'fa fa-exit'),
        ];
    }
}
