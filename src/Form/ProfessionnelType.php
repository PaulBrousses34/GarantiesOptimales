<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfessionnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('formeJuridique', ChoiceType::class, [
            'label' => 'Forme Juridique',
            'required' => true,
            'multiple' => false,
            'choices'  => [
                'Artisan' => 'Artisan',
                'Association' => 'Association',
                'Auto-entrepreneur' => 'Auto-entrepreneur',
                'EIRL' => 'EIRL',
                'EURL' => 'EURL',
                'Mairie' => 'Mairie',
                'Mme/Mr' => 'Mme/Mr',
                'S.A' => 'S.A',
                'SARL' => 'SARL',
                'SAS' => 'SAS',
                'SASU' => 'SASU',
                'SCA' => 'SCA',
                'SCCV' => 'SCCV',
                'SCI' => 'SCI',
                'Syndic' => 'Syndic',
                'Autres' => 'Autres',
           ]])
           ->add('societe', TextType::class, [
            'required' => true,
            'label' => 'Société/Gerant',
           ])
           ->add('siren', NumberType::class, [
               'required' => false, 
               'label' => 'Numero SIREN/RCS'
           ])
           ->add('nom', TextType::class, [
               'label' => 'Nom / Prénom',
               'required' => 'true',
           ])
           ->add('adresse', TextType::class, [
               'required' => true,
               'label' => 'Adresse',
           ])
           ->add('complementAdresse', TextType::class, [
               'required' => false,
               'label' => 'Complément d\'adresse'
           ])
           ->add('codePostal', NumberType::class, [
               'label' => 'Code Postal',
               'required' => true,
           ])
           ->add('ville', TextType::class, [
               'label' => 'Ville',
               'required' => true,
           ])
           ->add('telephone', TextType::class, [
               'label' => 'Numero de telephone',
               'required' => true,
           ])
           ->add('dateCreation', TextType::class,[
               'required' => true,
               'help' => 'Si en cours de création, écrivez simplement en cours de création',
               'label' => 'Date de création',
           ])
           ->add('CA', TextType::class, [
               'required' => true,
               'label' => 'Chiffre d\'affaires ou Chiffre d\'affaires prévisionnel',
           ])
           ->add('APE', TextType::class, [
               'required' => false, 
               'label' => 'Code APE',
           ])
           ->add('message', TextareaType::class, [
               'required' => false,
               'label' => 'Information(s) complémentaire(s)',
               'help' => 'Si vous souhaitez ajouter un message/une information à votre demande de devis',
           ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
