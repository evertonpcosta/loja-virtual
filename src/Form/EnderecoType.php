<?php
// src/Form/EnderecoType.php
namespace App\Form;

use App\Entity\Endereco;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnderecoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rua', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('numero', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('complemento', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('bairro', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('cidade', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('estado', TextType::class, ['attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Endereco::class,
        ));
    }
}
