<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cantidad', IntegerType::class, array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'cantidad form-control ',
                        'placeholder' => 'Cantidad',
                        'style' => 'width: 100%',
                        'form' => 'formCotizacion',
						'min'=>0
                    ),
                    'required' => true
                ))
                ->add('producto', ChoiceType::class, array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'producto form-control ',
                        'style' => 'width: 100%',
                        'form' => 'formCotizacion'
                    ),
                    'required' => true,
                    'choices' => $options['data'],
                    'choice_label' => function ($choiceValue, $key, $value) {
//                        var_dump($value);
//                        var_dump($key);
//                        var_dump($value);
//                        
                        return strtoupper($key);
                    },
                    'placeholder' => 'Elige un producto o servicio',
                ))
                ->add('preciounidad', TextType::class, array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'preciounidad form-control',
                        'placeholder' => false,
                        'readonly' => true,
                        'form' => 'formCotizacion'
                )))
                ->add('subtotal', NumberType::class, array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'subtotal form-control',
                        'placeholder' => false,
                        'form' => 'formCotizacion',
                        'readonly' => true
                )));
    }

}
