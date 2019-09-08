<?php

namespace App\Form;

use App\Entity\DonationPayment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DonationProcess_2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount')

            ->add('currency', ChoiceType::class, [
                'label' => 'Donation number',
                'choices' => [
                    'PHP(Filipino pesos)' => 'PHP',
                    'USD(US dollar)' => 'USD',
                    'SGD(Singaporean dollar)' => 'SGD',
                    'EUR(Euro)' => 'EUR',
                    'CAD(Canadian dollar)' => 'CAD',
                    'HKD(Hong Kong dollar)' => 'HKD',
                ], ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DonationPayment::class,
        ]);
    }
}
