<?php

namespace App\Form;

use App\Entity\Fournisseur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_fournisseur', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "Enter le nom du fournisseur",
                ]
            ])
            ->add('prenom_fournisseur', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "Enter le prenom du fournisseur",
                ]
            ])
            ->add('adresse_fournisseur', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "Enter l'adresse du fournisseur",
                ]
            ])
            ->add('email_fournisseur', EmailType::class, [
                'required' => true,
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "Enter l'adresse du fournisseur",
                ]
            ])
            ->add('phone_fournisseur', TelType::class, [
                'required' => true,
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "XXXXXXXX",
                ]
            ])
        
            ->add('submit', SubmitType::class, [
                'label' =>"Enregistrer",
                'attr' => [
                    'class' => "btn btn-primary",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}
