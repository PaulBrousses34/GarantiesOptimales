<?php

namespace App\Controller\Admin;

use App\Entity\Document;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DocumentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Document::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        yield AssociationField::new('utilisateur');
        yield DateTimeField::new('DateTelechargement');
        yield ImageField::new('FichierFile')->setFormType(VichFileType::class);
        yield ChoiceField::new('Type')->setChoices([
            'Pièce d\'identité' => 'Pièce d\'identité',
            'Permis de conduire' => 'Permis de conduire',
            'Carte grise' => 'Carte grise',
            'Contrat' => 'Contrat',
            'Bail de location' => 'Bail de location',
            'Justificatif de domicile' => 'Justificatif de domicile',
            'Certificat de cession' => 'Certificat de cession',
            'Relevé d\'information' => 'Relevé d\'information',
            'RIB' => 'RIB',
            'Constat' => 'Constat',
            'Etat des lieux' => 'Etat des lieux',
            'Carte grise' => 'Carte grise',
            'K-BIS' => 'K-BIS',
            'Justificatif d\'experience' => 'Justificatif d\'experience',
            'Autre' => 'Autre',
        ]);
    }

}
