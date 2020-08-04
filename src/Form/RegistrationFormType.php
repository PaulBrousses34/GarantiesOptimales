<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

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

            ->add('adresse', null, [
                'label'=> 'Numero, type et nom de voie',
            ])

            ->add('codePostal', NumberType::class, [
                'label'=> 'Code Postal',
                'required'=>false,
            ])
            ->add('ville', null, [
                'label'=> 'Ville',
            ])
            ->add('newsletter', CheckboxType::class,
            [
                'help' => 'Cocher la case si vous souhaitez vous abonner a notre newsletter et recevoir nos dernières offres et actualités',
                'label' => 'Newsletter',
                'required' => false,
            ])


            // This add is for the edit and not for the add (create a new account)
            ->add('password', RepeatedType::class,[
                'type'=>PasswordType::class,
                'required'=>false,
                'help'=>'Votre mot de passe doit être compris entre 8 et 20 caractères et doit contenir au moins une minuscle,
                une majuscule, un chiffre et un des caractères spéciaux $ @ % * + - _ !',
                'mapped'=>false,
                'first_options'=>[
                    'label'=>'Mot de passe',
                ],
                'second_options'=>[
                    'label'=>'Retaper le mot de passe',
                ],
                'invalid_message' => 'Les deux mots de passe ne correspondent pas',
                'constraints'=> [
                    new NotBlank([
                    'allowNull'=>true,
                    'normalizer'=>'trim',
                    'message'=>'Ce champ ne doit pas être vide',
                    ]),
                    new Regex([
                        'pattern'=>'/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,20})$/',
                        'message' => 'Votre mot de passe doit être compris entre 8 et 20 caractères et doit contenir au moins une minuscle,
                         une majuscule, un chiffre et un des caractères spéciaux $ @ % * + - _ !',
                    ])
                ],
            ])

                // To modify the form, it depend of the context
            ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
                $form = $event->getForm();
                $user = $event->getData();

                // If Id = null we create a new user
                if($user->getId() === null){
                    // we want to add the input where we need to accept the CGU
                    $form->add('agreeTerms', CheckboxType::class, [
                        'label'=>' J\'accepte les CGU',
                        'required'=>true,
                        'mapped'=>false,
                        'constraints' => [
                            new IsTrue([
                                'message' => 'Vous devez accepter nos termes',
                            ]),
                        ],
                    ]);
                    // Password input required to create a new user
                    $form->remove('password');
                    $form->add('password', RepeatedType::class,[
                        'type'=>PasswordType::class,
                        'help'=>'Votre mot de passe doit être compris entre 8 et 20 caractères et doit contenir au moins une minuscle,
                        une majuscule, un chiffre et un des caractères spéciaux $ @ % * + - _ !',
                        'first_options'=>[
                            'label'=>'Mot de passe'
                        ],
                        'second_options'=>[
                            'label'=>'Confirmer mot de passe'
                        ],
                        'invalid_message' => 'Les deux mots de passe ne correspondent pas',
                        'required'=> true,
                        'constraints'=> [
                            new NotBlank([
                                'allowNull'=>true,
                                'normalizer'=>'trim',
                                'message'=>'Ce champ ne doit pas être vide',
                                ]),
                            new Regex([
                                'pattern'=>'/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,20})$/',
                                'message' => 'Votre mot de passe doit être compris entre 8 et 20 caractères et doit contenir au moins une minuscle,
                                 une majuscule, un chiffre et un des caractères spéciaux $ @ % * + - _ !',
                            ])
                        ],
                    ]);
                }
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
