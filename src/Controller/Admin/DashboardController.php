<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Document;
use App\Entity\SousCategorie;
use App\Entity\Type;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Liguori Assurances');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Back Office', 'fa-home'),

            MenuItem::section('Produits'),
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Categorie::class),
            MenuItem::linkToCrud('Sous Categories', 'fa fa-file-text', SousCategorie::class),
            MenuItem::linkToCrud('Type', 'fa fa-tags', Type::class),


            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', Utilisateur::class),
            MenuItem::linkToCrud('Documents', 'fa fa-file-text', Document::class),

            //MenuItem::linkToLogout('Logout', 'fa fa-exit'),
        ];
    }
}
