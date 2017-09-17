<?php

namespace gestionFondosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class PersonasType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apellido', TextType::class, array(
                'required'=> 'required',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('nombres', TextType::class, array(
                'required'=> 'required',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('dni', TextType::class, array(
                'required'=> 'required',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('cuil', TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('email', EmailType::class, array(
                'required'=> 'required',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('telefono', IntegerType::class, array(
                'required'=> 'required',
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('domicilio', TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))
            ->add('localidad', TextType::class, array(
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
            'data_class' => 'gestionFondosBundle\Entity\Personas'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionfondosbundle_personas';
    }


}
