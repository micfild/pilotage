<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trackDate', DateType::class, [
                'widget' => 'choice',
                'format' => 'M-d-y',
                'years' => range(date('Y'), date('Y')+1,1),
            ])
            ->add('createdAt')
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'reservation.type.pending.label' => 1,
                    'reservation.type.validated.label' => 2,
                    'reservation.type.done.label' => 3,
                ]
            ])
            ->add('bike')
            ->add('customer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
