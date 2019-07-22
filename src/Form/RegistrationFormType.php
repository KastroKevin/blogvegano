<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\IsTrue;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Correo',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Contrasena',
                'attr' => [
                  'class' => 'form-control'
                ],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Porfavor ingrese una contrasena',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Tu Contrasena deberia de tener {{ limit }} de caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Aceptar',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Aceptas Los Terminos Y Condiciones?',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
