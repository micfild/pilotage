<?php

namespace App\Form;

use App\Entity\BikeOwner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BikeOwnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender')
            ->add('firstName')
            ->add('lastName')
            ->add('address')
            ->add('postalCode')
            ->add('city')
            ->add('mail')
            ->add('phone')
            ->add('birthDate', DateType::class, [
                'widget' => 'choice',
                'format' => 'M-d-y',
                'years' => range('1950', date('Y'),1),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BikeOwner::class,
        ]);
    }
}
