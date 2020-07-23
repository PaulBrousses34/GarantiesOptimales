<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
 
        $builder
            ->add('email',EmailType::class,
                [
                'label'=>'Email',
                'help' => 'Merci d\'indiquer une adresse email valide afin que nous puissions répondre à votre message',

                'constraints'=> [
                new NotBlank([
                'message'=>'Ce champ ne doit pas être vide',
                ]),
                new Email([
                'message'=>'L\'email n\'est pas valide'
                ]),
                ]]
                )

            ->add('lastname', null, [
                'label'=>'Nom',
                'help'=>'Le nom d\'utilisateur ne peut pas contenir d\'espace ni de caractères spéciaux à l\'exception de \'-\' et \'_\'',
                'constraints'=> [
                    new NotBlank([
                        'message'=>'Ce champ ne doit pas être vide',
                        'normalizer'=>'trim',
                    ]),
    
                    new NotNull([
                        'message'=>'Ce champ ne doit pas être vide',
                ])
                ],
                ])
    
            ->add('firstname', null, [
                'label'=>'Prénom',
                'help'=>'Le prénom d\'utilisateur ne peut pas contenir d\'espace ni de caractères spéciaux à l\'exception de \'-\' et \'_\'',
                'constraints'=> [
                    new NotBlank([
                        'message'=>'Ce champ ne doit pas être vide',
                        'normalizer'=>'trim',
                        ]),
     
                        new NotNull([
                        'message'=>'Ce champ ne doit pas être vide',
                    ])
                    ],
                ])
            ->add('subject', TextType::class, [
                'required'=>true,
                'label' => 'Objet',
                'help' => 'L\'objet de votre message doit contenir au minimum 5 caractères et au maximum 50 caractères',
                'constraints'=> [
                new NotBlank([
                'message'=>'Ce champ ne doit pas être vide',
                ]),
                new Assert\Length([
                'min' => 5,
                'max' => 50,
                'minMessage' => 'L\'objet du message doit contenir au moins 5 caractères',
                'maxMessage' => 'L\'objet du message ne doit pas contenir plus de 50 caractères',
                ]),
            ]])
            ->add('message', TextareaType::class, [
                'required'=>true,
                'help' => 'Votre message doit contenir au minimum 5 caractères et au maximum 1000 caractères',
                'label' => 'Message',
                'constraints'=> [
                new NotBlank([
                'message'=>'Ce champ ne doit pas être vide',
                ]),
                new Assert\Length([
                'min' => 5,
                'max' => 1000,
                'minMessage' => 'Le contenu du message doit contenir au moins 5 caractères',
                'maxMessage' => 'L\'objet du message ne doit pas contenir plus de 1000 caractères',
                ])
            ]])
            ->add('file', FileType::class, [
                'required'=>false,
                'label' => 'Joindre un fichier',
                'attr' => ['placeholder' => 'Sélectionner votre fichier'],
                'mapped' => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
