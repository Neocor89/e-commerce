<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //: Form formatting with bootstrapp ('class' => '')
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control mb-1'
                ],
                'label' => 'E-mail'
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-1'
                ],
                'label' => 'Lastname'
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-1'
                ],
                'label' => 'firstname'
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-1'
                ],
                'label' => 'address'
            ])
            ->add('zipcode', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-1'
                ],
                'label' => 'zipcode'
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-1'
                ],
                'label' => 'city'
            ])
            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label' => 'Terms of Use'
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control mb-1'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Your password'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
