<?php

namespace App\Form;


use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_prenom')
            ->add('email')
            ->add('numtel')
            ->add('mdp',RepeatedType::class, [
                'type'=>PasswordType::class,
                'first_options'=>['label'=>'mdp'],
                'second_options'=>['label'=>'Confirm Password']
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'M' => 'M',
                    'F' => 'F',
                ],
                'placeholder' => 'Choose an option',
            ])
            ->add('dateNaisssance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
