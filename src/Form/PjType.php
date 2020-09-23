<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class PjType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lastname', null, [
            'label'=>'Nom',
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

        ->add('email', null,[
            'label'=>'Email',
            'constraints'=> [
                 new NotBlank([
                 'message'=>'Ce champ ne doit pas être vide',
            ]),
                 new Email([
                 'message'=>'L\'email n\'est pas valide'
            ]),
            ]
        ])
        ->add('dateNaissance', null,[
            'label'=>'Date de naissance',
            'help' => 'jj/mm/aaaa',
            'constraints'=> [
                 new NotBlank([
                 'message'=>'Ce champ ne doit pas être vide',
            ]),
            ]
        ])
        ->add('profession', null,[
            'label'=>'Profession',
            'constraints'=> [
                 new NotBlank([
                 'message'=>'Ce champ ne doit pas être vide',
            ]),
            ]
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
