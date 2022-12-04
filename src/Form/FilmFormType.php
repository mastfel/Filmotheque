<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilmFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre',TextType::class, [
            'label'=> false,
            'attr'=>[
                'placeholder' => 'Titre'
            ],
        ])
        ->add('realisateur', TextType::class,[
            'label' => false,
            'attr' => [
                'placeholder' => 'Réalisateur'
            ],
        ])
        ->add('duree', TextType::class,[
            'label' => false,
            'attr' =>[
                'placeholder' => 'Durée'
            ]
        ])
        ->add('anneeSortie', TextType::class,[
            'label' => false,
            'attr' =>[
                'placeholder' =>'Année de sortie'
            ]
        ])

        ->add('submit', SubmitType::class, [
            'label' => 'Valider',
            'validate' =>false
    
        ]);
        
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
