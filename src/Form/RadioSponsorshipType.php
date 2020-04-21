<?php

namespace App\Form;

use App\Entity\RadioSponsorship;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RadioSponsorshipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('solicitor')
            ->add('numberOfWeek')
            ->add('a1')
            ->add('a2')
            ->add('a3')
            ->add('rp120')
            ->add('adName')
            ->add('amount')
            ->add('arDiese')
            ->add('ar')
            ->add('date')
            ->add('adDateFrom')
            ->add('adDateTo')
            ->add('renewDate')
            ->add('contactNumber')
            ->add('area')
            
           /* ->add('type', ChoiceType::class, [
                'label' => 'Article type',
                'choices' => [
                    'Anchor' => '1',
                    'Daily gospels' => '2',
                    'Saints of the day' => '3',
                    'Radio program' => '4',
                    'TV program' => '5',
                    'Uyas' => '6',
                ], ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RadioSponsorship::class,
        ]);
    }
}
