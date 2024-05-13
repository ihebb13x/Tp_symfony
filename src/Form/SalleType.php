<?php

namespace App\Form;

use App\Entity\Department;
use App\Entity\Salle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero')
            ->add('capacite')
            ->add('etage')
            ->add('nomdepart')
            ->add('department', EntityType::class, [
                'class' => department::class,
                'choice_label' => 'id',
            ])
            ->add('appartient', EntityType::class, [
                'class' => department::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salle::class,
        ]);
    }
}
