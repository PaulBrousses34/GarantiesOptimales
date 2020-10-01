<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
            yield IntegerField::new('id', 'ID');
            yield EmailField::new('email');
            yield ArrayField::new('roles');
            yield TextField::new('firstname');
            yield TextField::new('lastname');
            yield BooleanField::new('isVerified');
            yield TextField::new('adresse');
            yield TextField::new('ville');
            yield IntegerField::new('codePostal');
            yield BooleanField::new('Newsletter');
            yield AssociationField::new('Document');


    }
    
}
