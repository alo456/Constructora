<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class DatosType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
//                ->add('nombre', TextType::class, array(
//                    'label' => false,
//                    'attr' => array(
//                        'class' => 'form-control ',
//                        'placeholder' => 'Nombre',
//                        'style' => 'width: 100%'
//                    ),
//                    'required' => true
//                ))
//                ->add('apellidos', TextType::class, array(
//                    'label' => false,
//                    'attr' => array(
//                        'class' => 'form-control ',
//                        'placeholder' => 'Apellidos',
//                        'style' => 'width: 100%'
//                    ),
//                    'required' => true
//                ))
//                ->add('telefono', TextType::class, array(
//                    'label' => false,
//                    'attr' => array(
//                        'class' => 'form-control ',
//                        'placeholder' => 'Telefono',
//                        'style' => 'width: 100%'
//                    ),
//                    'required' => true
//                ))
//                ->add('direccion', TextType::class, array(
//                    'label' => false,
//                    'attr' => array(
//                        'class' => 'form-control ',
//                        'placeholder' => 'Direccion',
//                        'style' => 'width: 100%'
//                    ),
//                    'required' => true
//                ))
                ->add('data', HiddenType::class, array(
                    'label' => false
                ))
                ->add('email', EmailType::class, array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'form-control ',
                        'placeholder' => 'alguien@dominio.com',
                        'style' => 'width: 100%'
                    ),
                    'required' => true
                ))
                ->add('submit', SubmitType::class, array(
                    'label' => 'Enviar',
                    'attr' => array(
                        'class' => 'form-control ',
                        'style' => 'width: 100%'
                    )
                ));
    }

}
