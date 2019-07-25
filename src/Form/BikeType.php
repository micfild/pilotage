<?php

namespace App\Form;

use App\Entity\Bike;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', null, [
                'label' => 'bikes.form.brand.label',
            ])
            ->add('model', null, [
                'label' => 'bikes.form.model.label',
            ])
            ->add('matriculation', null, [
                'label' => 'bikes.form.matriculation.label',
            ])
            ->add('color', null, [
                'label' => 'bikes.form.color.label',
            ])
            ->add('power', null, [
                'label' => 'bikes.form.power.lable',
            ])
            ->add('km', null, [
                'label' => 'bikes.form.km.label',
            ])
            ->add('productionYear', DateType::class, [
                'label' => 'bikes.form.productionyear.label',
                'widget' => 'choice',
                'format' => 'M-d-y',
                'years' => range('1970', date('Y'),1),
            ])
            ->add('status', null, [
                'label' => 'bikes.form.status.label',
            ])
            ->add('tags', null, [
                'label' => 'bikes.form.tags.label',
            ])
            ->add('bikeOwner', null, [
                'label' => 'bikes.form.bikeowner.label',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bike::class,
        ]);
    }
}
