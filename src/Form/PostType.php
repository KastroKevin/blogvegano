<?php

namespace App\Form;

use App\Entity\Post;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titulo',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', CKEditorType::class, [
                'label' => 'Descripcion',
                'attr' => [
                    'class' => 'form-control'
                ],
                'config' => [
                    'uiColor' => '#ffffff'
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Subir Imagen',
                'attr' => [
                    'class' => 'form-control'
                ],
                'data_class' => null
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
