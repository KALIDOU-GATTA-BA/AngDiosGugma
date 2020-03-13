<?php

namespace App\Form;

use App\Entity\YouTube;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class YouTubeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link')
            ->add('type', ChoiceType::class, [
                'label' => 'Program type',
                'placeholder'=>'Choise a type',
                'choices' => [
                    'ANG DIOS GUGMA INTERNATIONAL TODAY' => 1,
                    'ANG DIOS GUMA TELERADIO' => 2,
                    'ANG DIOS GUGMA BAHAGHARI' => 3,
                    'ANG DIOS GUGMA SOUND OF WORSHIP' => 4,
                    'SI JESUS NGA MANUNODLO' => 5,
                    'SI JESUS KAG ANG MGA KUBOS' => 6,
                    'AMY OFFERING OF LOVE' => 7,
                    'ANG DIOS GUGMA GENERAL PRAYER MEETING' => 8,
                    'ANG DIOS GUGMA INTERNATIONAL PRAYER MEETING' => 9,
                    'ANG DIOS GUGMA HOLY MASS' => 10,
                    'ANG DIOS GUGMA FAMILY APPOINTMENT DAY' => 11,
                    'ANG DIOS GUGMA LORD’S DAY' => 12,
                    'IKAW AKO KAUPOD SI KRISTO' => 13,
                    'EMMANUEL “ANG DIOS KAUPOD NATON' => 14,
                    'LAIKO EXPRESS BULLETIN' => 15,
                    'THE POWER OF GIVING' => 16,
                    'HARANA SANG ANG DIOS GUGMA KAUPOD SI MARIA' => 17,
                    'KABUHI KAG PAMILYA BALAAN DAPAT AMLIGAN' => 18,
                    'ANG DIOS GUGMA OUTREACH' => 19,
                    'ANG DIOS GUGMA SPECIAL EVENTS' => 20,  
                ], ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => YouTube::class,
        ]);
    }
}
