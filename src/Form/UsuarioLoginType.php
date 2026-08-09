<?php

namespace App\Form;

use App\Entity\UsuarioLogin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioLoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Usuario', TextType::class)
            ->add('Password', PasswordType::class)
            ->add('NivelAcceso', IntegerType::class)
            ->add('Nombre', TextType::class)
            ->add('Cargo', TextType::class)
            ->add('Interno', TextType::class, [
                'required' => false,
            ])
            ->add('Correo', EmailType::class, [
                'required' => false,
            ])
            ->add('Imagen', TextType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UsuarioLogin::class,
        ]);
    }
}