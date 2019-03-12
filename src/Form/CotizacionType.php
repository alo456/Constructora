<?php

namespace App\Form;

use App\Form\ProductoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class CotizacionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        //var_dump($options['data']);
        
        $productos = $options['data'];
        $envios = $options['attr'];
        $options['attr'] = [];
        $builder
                ->add('productos', CollectionType::class, array(
                    'entry_type' => ProductoType::class,
                    'label' => false,
                    'entry_options' => [
                        'attr' => [
                            'class' => 'producto', // we want to use 'tr.item' as collection elements' selector
                        ],
                        'data' => $productos
                    ],
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'required' => false,
                    'by_reference' => true,
                    'delete_empty' => true,
                    'attr' => [
                        'class' => 'table producto-collection',
                    ],
                ))
                ->add('envio', ChoiceType::class, array(
                    'label' => 'Envio',
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => false,
                        'form' => 'formCotizacion'
                    ),
                    'choices' => $envios,
                    
                    'placeholder' => 'Elige el Tipo de Envio',
                ))
                ->add('costoenvio', NumberType::class, array(
                    'label' => 'Costo del Envio',
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => false,
                        'readonly' => true,
                        'value' => '0',
                        'form' => 'formCotizacion'
                    )))
                ->add('total', NumberType::class, array(
                    'label' => 'Total',
                    'attr' => array(
                        'class' => 'total form-control',
                        'placeholder' => false,
                        'readonly' => true,
                        'value' => '0',
                        'form' => 'formCotizacion'
                    )))
                ->add('pagar', ButtonType::class, array(
                    'label' => 'Proceder al Pago',
                    'attr' => array(
                        'class' => 'btn btn-primary float-right'
                    )
                ))
                ->add('correo', ButtonType::class, array(
                    'label' => 'Mandar Cotización por Correo',
                    'attr' => array(
                        'class' => 'btn btn-primary float-right'
                    )
                ))
                ->add('imprimir', ButtonType::class, array(
                    'label' => 'Imprimir',
                    'attr' => array(
                        'class' => 'btn btn-primary float-right',
                        'onclick' => 'window.print()'
                    )
                ))
                ;
    }

}
