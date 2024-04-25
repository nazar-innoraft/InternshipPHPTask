<?php

namespace App\Form;

use App\Entity\Mobile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MobileFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name', TextType::class, [
        'attr' => array(
          'placeholder' => 'Enter Mobile name...'
        ),
        'label' => false
      ])
      ->add('brand', TextType::class, [
        'attr' => array(
          'placeholder' => 'Enter Brand name...'
        ),
        'label' => false
      ])
      ->add('price', NumberType::class, [
        'attr' => array(
          'placeholder' => 'Enter Price...'
        ),
        'label' => false
      ])
      ->add('frontCamera', NumberType::class, [
        'attr' => array(
          'placeholder' => 'Enter Front camera pixel size...'
        ),
        'label' => false
      ])
      ->add('backCamera', NumberType::class, [
        'attr' => array(
          'placeholder' => 'Enter Back camera pixel size...'
        ),
        'label' => false
      ])
      ->add('battery', NumberType::class, [
        'attr' => array(
          'placeholder' => 'Enter Battery size...'
        ),
        'label' => false
      ])
      ->add('ram', NumberType::class, [
        'attr' => array(
          'placeholder' => 'Enter Ram size...'
        ),
        'label' => false
      ])
      ->add('storage', NumberType::class, [
        'attr' => array(
          'placeholder' => 'Enter Storage size...'
        ),
        'label' => false
      ])
      ->add('add_mobile', SubmitType::class);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Mobile::class,
    ]);
  }
}
