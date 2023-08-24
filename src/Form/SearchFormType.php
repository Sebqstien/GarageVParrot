<?php

namespace App\Form;

use App\Data\SearchData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('priceMin', NumberType::class, [
                'label' => 'Prix Minimum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('priceMax', NumberType::class, [
                'label' => 'Prix Maximum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('kilometersMin', TextType::class, [
                'label' => 'Kilomètres Minimum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('kilometersMax', TextType::class, [
                'label' => 'Kilomètres Maximum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('yearMin', IntegerType::class, [
                'label' => 'Année Minimum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('yearMax', IntegerType::class, [
                'label' => 'Année Maximum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('brand', TextType::class, [
                'label' => 'Marque:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('energy', ChoiceType::class, [
                'label' => 'Carburant:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                'choices' => [
                    'DIESEL' => 'DIESEL',
                    'ESSENCE' => 'ESSENCE',
                    'GPL' => 'GPL',
                    'ELECTRIQUE' => 'ELECTRIQUE',
                ]
            ]);
    }

    /**
     *
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'POST',
        ]);
    }
}
