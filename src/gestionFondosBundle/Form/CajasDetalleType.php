<?php

namespace gestionFondosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use gestionFondosBundle\Form\ConceptosType;
use gestionFondosBundle\Form\ComprobantesType;
use gestionFondosBundle\Form\ProveedoresType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use gestionFondosBundle\Repository\ProveedoresRepository;
use gestionFondosBundle\Repository\ComprobantesRepository;
use gestionFondosBundle\Repository\ConceptosRepository;
use Doctrine\ORM\EntityRepository;

class CajasDetalleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('fecha',  DateType::class, array(
                    'widget' => 'single_text',

                    // do not render as type="date", to avoid HTML5 date pickers
                    'html5' => false,

                    // add a class that can be selected in JavaScript
                    'attr' => ['class' => 'js-datepicker'],
                ))
        ->add('nroComprobante', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        ->add('socio', HiddenType::class, array(
            ))
        ->add('descripcion', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        ->add('debe', IntegerType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        ->add('haber', IntegerType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        ->add('tipoIngreso', IntegerType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        ->add('fondoOrigen', IntegerType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        /**->add('idCaja', IntegerType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))**/
        ->add('tipoComprobante', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        ->add('proveedor', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )))
        ->add('codigoConcepto', TextType::class, array(
                'attr'=> array(
                    'class'=>'form-control'
                )));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'gestionFondosBundle\Entity\CajasDetalle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionfondosbundle_cajasdetalle';
    }


}
