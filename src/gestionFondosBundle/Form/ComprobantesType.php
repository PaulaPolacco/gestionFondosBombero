<?php

namespace gestionFondosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ComprobantesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo', TextType::class, array(
                'required'=> 'required',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('descripcion', TextareaType::class, array(
                'required'=> 'required',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('Guardar', SubmitType::class, array(
                'attr'=>array(
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
            'data_class' => 'gestionFondosBundle\Entity\Comprobantes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionfondosbundle_comprobantes';
    }


}
