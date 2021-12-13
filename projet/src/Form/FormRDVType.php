<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormRDVType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Votre Nom',
                'attr'=>[
                    'placeholder' => 'Cabrel'
                ]
            ])
            ->add('prenom', TextType::class,[
                'label' => 'Votre Prénom',
                'attr'=>[
                    'placeholder' => 'Francis'
                ]
            ])
        ->add('email', EmailType::class,[
            'label' => 'Votre Email',
            'attr'=>[
                'placeholder' => 'Cabrel@francis.fr'
            ]
        ])
        ->add('tel', TelType::class,[
            'label' => 'Votre Téléphone',
            'attr'=>[
                'placeholder' => '0000000000'
            ]
        ])
        ->add('numTouriste',NumberType::class,[
            'label' => 'Nombre de touristes',
            'attr'=>[
            ]
        ])
        ->add('dateArrive',DateType::class,[
            'label' => 'La date de votre arrivé',
            'attr'=>[
            ]
        ])
        ->add('dateDepart',DateType::class,[
            'label' => 'La date du départ',
            'attr'=>[
                'placeholder' => ''
            ]
        ])
        ->add('newletter',CheckboxType::class)
        ->add('infoRDV',TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
