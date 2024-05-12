<?php
// src/Form/PayementType.php

namespace App\Form;

use App\Entity\Payement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PayementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // List of countries
        $countries = [
            'France' => 'France',
            'United States' => 'United States',
            'Canada' => 'Canada',
            // Add more countries as needed...
        ];

        $builder
            ->add('fullName', TextType::class, [
                'label' => 'Full Name'
            ])
            ->add('country', ChoiceType::class, [
                'label' => 'Country',
                'choices' => $countries,
                'placeholder' => 'Select a country',
                'required' => true,
            ])
            ->add('address', TextType::class, [
                'label' => 'Address'
            ])
            ->add('state', TextType::class, [
                'label' => 'State',
                'required' => true,
                // You can add any additional options for the text input field here
            ])
            ->add('securityCode', TextType::class, [
                'label' => 'Security Code'
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'Phone Number'
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Zip Code'
            ])
            ->add('paymentMethod', TextType::class, [
                'label' => 'Payment Method'
            ])
            ->add('expirationDate', DateType::class, [
                'label' => 'Expiration Date',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('cardNumber', TextType::class, [
                'label' => 'Card Number'
            ])
            ->add('payementTotal', TextType::class, [
                'label' => 'Montant du paiement'
            ])
            ->add('payementDate', DateType::class, [
                'label' => 'Date du paiement',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Payement::class,
        ]);
    }
}
