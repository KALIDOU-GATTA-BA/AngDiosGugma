<?php

namespace App\Form;

use App\Entity\StudentAdd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StudentAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('status')
            ->add('address')
            ->add('age')
            ->add('birthDate')
            ->add('grade')
            ->add('representative')
            ->add('adgWorkerOrIndigent', ChoiceType::class, [
                'choices' => [
                    'ADG WORKER' => 'ADG WORKER',
                    'INDIGENT' => 'INDIGENT',
                ], ])
             ->add('contactNumber');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StudentAdd::class,
        ]);
    }
}
