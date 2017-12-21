<?php

namespace Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Models\UserModel;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserForm builds the required fields that are displayed
 * in the signup with their validation.    
*/
class UserForm extends AbstractType {
   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
                'username',
                TextType::class,
                [
                    'constraints' => [
                        new Assert\NotBlank(),
                        new Assert\Regex([
                            'pattern' => '/^[A-Za-z0-9_-]*$/'
                        ])
                    ]
                ]
            )->add(
                'firstname',
                TextType::class,
                [
                    'constraints' => [
                        new Assert\NotBlank()
                    ]
                ]
            )->add(
                'lastname',
                TextType::class,
                [
                    'constraints' => [
                        new Assert\NotBlank()
                    ]
                ]
            )->add(
                'email',
                EmailType::class,
                [
                    'constraints' => [
                        new Assert\NotBlank()
                        
                    ]
                ]
            )->add(
                'password',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options' => [
                        'label' => 'Password',
                        'constraints' => [
                            new Assert\NotBlank(),
                            new Assert\Regex([
                                'pattern' => '/[A-Z]+/',
                                'message'=> 'The password must contain at least 1 Uppercase'                                                   
                            ]),
                            new Assert\Regex([
                                'pattern' => '/[a-z]+/',
                                'message'=> 'The password must contain Lowercase characters'
                            ]),
                            new Assert\Regex([
                                'pattern' => '/[0-9]+/',
                                'message'=> 'The password must contain at least 1 Number'
                            ]),
                            new Assert\Regex([
                                'pattern' => '/[^0-9A-Za-z]+/',
                                'message'=> 'The password must contain at least 1 Special character'
                            ]),
                            new Assert\Length([
                                'min'        => 8,
                                'max'        => 45
                            ])
                        ]
                    ],
                    'second_options' => [
                        'label' => 'Repeat password'
                    ]
                ]
            )->add(
                'report',
                ChoiceType::class, array (
                    'choices' => array (
                        1 => 'yes',
                        0 => 'no'
                    ),
                    'expanded'=> true
                )

            )->add(
                'newsletter',
                ChoiceType::class,array (
                    'choices' => array (
                        1 => 'yes',
                        0 => 'no'
                    ),
                    'expanded'=> true
                )
            );
      
        if ($options['standalone']) {
            $builder->add('submit', SubmitType::class);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', UserModel::class);
        $resolver->setDefault('standalone', false);
        
        $resolver->addAllowedTypes('standalone', 'bool');
    }
}
