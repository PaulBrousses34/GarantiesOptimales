<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Fichier', FileType::class)
            ->add('Type', ChoiceType::class, [
                'label' => 'Type de document',
                'placeholder' => 'Choisissez le type de document',
                'choices' => [
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
                    ],
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
