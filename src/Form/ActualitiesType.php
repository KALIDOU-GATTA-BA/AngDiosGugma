<?php

namespace App\Form;

use App\Entity\Actualities;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActualitiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('author')
            ->add('type', ChoiceType::class, [
                'label' => 'Article type',
                'choices' => [
                    'Anchor' => '1',
                    'Daily gospels' => '2',
                    'Saints of the day' => '3',
                    'Radio program' => '4',
                    'TV program' => '5',
                    'Uyas' => '6',
                ], ])
            ->add('image', FileType::class, [
                'mapped'=>false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actualities::class,
        ]);
    }
}
