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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use gestionFondosBundle\Form\PersonasType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use gestionFondosBundle\Repository\PersonasRepository;
use Doctrine\ORM\EntityRepository;

use gestionFondosBundle\Form\DataTransformer\PersonaToStringTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\CallbackTransformer;

class ProveedoresType extends AbstractType 
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('persona', HiddenType::class, array(
            ))
            ->add('razonSocial', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('cuit', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('emailCorporativo', EmailType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('domicilio', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('localidad', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('telefonoFax', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('banco', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('nroCuenta', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('cbu', IntegerType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
            ->add('datosCheque', TextType::class , array(
                'attr'=> array(
                    'class'=>'form-control'
                )) 
            )
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
            'data_class' => 'gestionFondosBundle\Entity\Proveedores'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionfondosbundle_proveedores';
    }


}
