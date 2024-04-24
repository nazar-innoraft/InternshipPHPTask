<?php

namespace App\Form;

use App\Entity\Blogs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * This class create Form layout.
 */
class BlogsFormType extends AbstractType
{
  /**
   * This function build Form.
   *
   * @param  mixed $builder
   *   FormBuilderInterface class object.
   * @param  mixed $options
   *
   * @return void
   */
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('title', TextType::class, [
              'attr'=>array(
                'class' => 'block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                'placeholder' => 'Enter title...'
              ),
              'label' => false
            ])
            ->add('description', TextareaType::class, [
              'attr' => array(
                'style' => 'height: 400px',
                'class' => 'block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                'placeholder' => 'Enter description...'
              ),
              'label' => false
            ])
            ->add('imagePath', FileType::class, [
              'required' => false,
              'mapped' => false,
              'attr' => array(
                'class' => 'py-6'
              )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Blogs::class,
        ]);
    }
}
