<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_utilisateur', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "Enter le nom de l'utilisateur",
                ]
            ])

            ->add('prenom_utilisateur', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "Enter le prenom de l'utilisateur",
                ]
            ])

            ->add('email_utilisateur', EmailType::class, [
                'required' => true,
                "attr" => [
                    "class" => "form-control",
                    'placeholder' => "Enter l'email de l'utilisateur",
                ]
            ])
            
            ->add('phone_utilisateur', TelType::class, [
                'required' => true,
               "attr" => [
                    "class" => "form-control",
                ]
            ])

            ->add('adresse_utilisateur', TextType::class, [
                'required' => true,
                 "attr" => [
                    "class" => "form-control",
                ]
            ])

            ->add('date_naissance', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
                'required' => true,
                "attr" => [
                    "class" => "form-control datetimepicker-input",
                    'data-target'=>"#dateNaissance"
               
                ]
            ])

            ->add('photo', FileType::class, [
                'data_class' => null,
                'required' => false,
                "attr" => [
                    "class" => "custom-file-input",
                ]
                
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Enregistrer",
                "attr" => [
                    'class' => "btn btn-primary",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
