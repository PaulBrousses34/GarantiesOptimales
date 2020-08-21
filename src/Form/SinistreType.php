<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SinistreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
        ->add('numberContract', TextType::class, [
            'label' => 'Numéro de contrat',])
        ->add('constat', FileType::class, ['label' => 'Constat ou déclaration',])
        ->add('other', FileType::class, 
        [
            'label' => 'Joindre un autre document',
            'required' => false,
            'mapped' => false,
        ])
        ->add('type', ChoiceType::class, [
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
            'required' => false,
        ])
        
        ->add('message', TextareaType::class, [
        'required' => false,])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
