<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'input'],
                'label' => 'Veuillez entre le titre',
                'label_attr' => ['class' => 'label_input'],
            ])
            ->add('content', TextType::class, [
                'attr' => ['class' => 'input'],
                'label' => 'veuillez entrer le contenu',
                'label_attr' => ['class' => 'label_input'],
            ])

            // ->add('expiryDate', null, [
            //     'widget' => 'single_text'
            // ])
            // ->add('statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
