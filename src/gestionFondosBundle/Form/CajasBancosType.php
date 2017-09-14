<?php

namespace gestionFondosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CajasBancosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class, array(
                'required'=>'required',
                'attr' => array (
                    'class'=>'form-control'
                ) 
            ))
            ->add('descripcion', TextareaType::class, array(
                'required'=>'required',
                'attr' => array (
                    'class'=>'form-control'
                ) 
            ))
            ->add('banco',TextType::class, array(
                'required'=>'required',
                'attr' => array (
                    'class'=>'form-control'
                )
            ))
            ->add('nroCuenta',TextType::class, array(
                'required'=>'required',
                'attr' => array (
                    'class'=>'form-control'
                )
            ))
            ->add('cbu',IntegerType::class, array(
                'required'=>'required',
                'attr' => array (
                    'class'=>'form-control'
                )    
            ))
            ->add('alias',TextType::class, array(
                'required'=>'required',
                'attr' => array (
                    'class'=>'form-control'
                )
            ))
            ->add('Guardar', SubmitType::class, array(
                'attr' => array (
                    'class'=>'btn btn-success center-block'
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'gestionFondosBundle\Entity\CajasBancos'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionfondosbundle_cajasbancos';
    }


}
