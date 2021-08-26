<?php

namespace App\Form;

use App\Entity\Option;
use App\Entity\PropertySearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'minPrice',
                IntegerType::class,
                ['label' => 'minPrice', 'required' => false, 'attr' => ['placeholder' => 'Prix minimale']]
            )
            ->add(
                'maxPrice',
                IntegerType::class,
                ['label' => 'maxPrice', 'required' => false, 'attr' => ['placeholder' => 'Prix maximum']]
            )
            ->add(
                'minSurface',
                IntegerType::class,
                ['label' => 'minSurface', 'required' => false, 'attr' => ['placeholder' => 'Surface minimale']]
            )
            ->add(
                'maxSurface',
                IntegerType::class,
                ['label' => 'maxSurface', 'required' => false, 'attr' => ['placeholder' => 'Surface maximum']]
            )
            ->add(
                'options',
                EntityType::class,
                ['label' => 'Options', 'required' => false, 'class' => Option::class, 'choice_label' => 'name', 'multiple' => true]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => PropertySearch::class,
            'method'          => 'get',
            'csrf_protection' => false,
            'translation_domain' => 'forms'
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
