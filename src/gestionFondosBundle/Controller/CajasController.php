<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use gestionFondosBundle\Entity\Cajas;
use gestionFondosBundle\Entity\CajasBancos;
use gestionFondosBundle\Entity\CajasDetalle;
use gestionFondosBundle\Entity\Proveedores;
use gestionFondosBundle\Entity\Comprobantes;
use gestionFondosBundle\Entity\Conceptos;
use gestionFondosBundle\Entity\Socios;
use gestionFondosBundle\Form\CajasType;
use gestionFondosBundle\Form\CajasBancosType;
use gestionFondosBundle\Form\CajasDetalleType;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class CajasController extends Controller
{
    /**
     * @Route("/cajas", name="cajas")
     */
    public function indexAction(Request $request)
    {
        //obtiene todas las cajas de la BD
        $em = $this->getDoctrine()->getManager();
        $bd = $em->getConnection();

        //realiza la query y la ejecuta en la BD
        $query = "SELECT * FROM cajas";
        $stmt = $bd->prepare($query);
        $params = array();
        $stmt->execute($params);

        $cajas = $stmt->fetchAll();


        return $this->render('gestionFondosBundle:Cajas:index.html.twig',array(
            'cajas' => $cajas,
            'otra' => "cualquier cosa"
        ));
    }

    /**
     * @Route("caja/nueva", name="nueva_caja")
    */
    public function nuevaCaja(Request $request)
    {   
        //crea los formularios para las cajas y las cajas de bancos
        $caja = new Cajas();
        $cajaBanco = new CajasBancos();
        $form = $this->createForm(CajasType::class, $caja);
        $formBancos = $this->createForm(CajasBancosType::class, $cajaBanco);

        if ($request->isMethod('POST')){
            //toma del request los datos del formulario
            $form->handleRequest($request);
            
            if($form->isValid()){
                $caja = new Cajas();
                $caja->setNombre($form->get("nombre")->getData());
                $caja->setDescripcion($form->get("descripcion")->getData());

                //guarda los datos en la BD
                $em = $this->getDoctrine()->getEntityManager();
                try{
                    $em->persist($caja);
                    $flush = $em->flush();
                }catch(UniqueConstraintViolationException $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Ya existe una caja con ese nombre');
                    return $this->render('gestionFondosBundle:Cajas:nueva_caja.html.twig',
                    array('form' => $form->createView()));
                }

                //verifica si la operacion de almacenar en la BD se completo de manera correcta
                if($flush == null)
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Caja creada correctamente!');
                else{
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'La caja no pudo ser creada!');
                }
                //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
                return $this->redirectToRoute('nueva_caja');
            }
        }
 
        return $this->render('gestionFondosBundle:Cajas:nueva_caja.html.twig',
                            array('form' => $form->createView(),
                                'formBanco' => $formBancos->createView()
                            ));
    }

    /**
     * @Route("/caja/nuevaBanco", name="nueva_caja_banco")
    */
    public function nuevaCajaBanco(Request $request)
    {  
        $cajaBanco = new CajasBancos();
        $form = $this->createForm(CajasBancosType::class, $cajaBanco);
        if ($request->isMethod('POST')){
            //toma del request los datos del formulario
            $form->handleRequest($request);
            
            if($form->isValid()){

                $caja = new CajasBancos();
                $caja->setNombre($form->get("nombre")->getData());
                $caja->setDescripcion($form->get("descripcion")->getData());
                $caja->setBanco($form->get("banco")->getData());
                $caja->setNroCuenta($form->get("nroCuenta")->getData());
                $caja->setCbu($form->get("cbu")->getData());
                $caja->setAlias($form->get("alias")->getData());
                
                //guarda los datos en la BD
                $em = $this->getDoctrine()->getEntityManager();
                try{
                    $em->persist($caja);
                    $flush = $em->flush();
                }catch(UniqueConstraintViolationException $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Ya existe una caja con ese nombre');
                    return $this->render('gestionFondosBundle:Cajas:nueva_caja.html.twig',
                    array('form' => $form->createView()));
                }

                //verifica si la operacion de almacenar en la BD se completo de manera correcta
                if($flush == null)
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Caja creada correctamente!');
                else{
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'La caja no pudo ser creada!');
                }
            }
        }

        return $this->redirectToRoute('nueva_caja');
    }

    /**
     * @Route("/caja/modificar/{id}", name="caja_modificar")
     */
     public function modificarCaja(Request $request, $id)
     {
        //obtiene la caja a modificar
        $repo = $this->getDoctrine()->getRepository(Cajas::class);
        $caja = $repo->findOneById($id);

        $form = $this->createForm(CajasType::class, $caja);

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form->isValid()){
                try{
                    $repo->updateCaja($caja);
                }catch(\Exeption $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Error al modificar la caja');
                    return $this->render('gestionFondosBundle:Cajas:modificar_caja.html.twig',
                    array('form' => $form->createView()));
                }
            }
        }
         return $this->render('gestionFondosBundle:Cajas:modificar_caja.html.twig',array(
            'form' => $form->createView()
         ));
     }


         /**
     * @Route("/caja/detalle", name="caja_detalle")
    */
    public function cajaDetalle(Request $request)
    {   
     //   $proveedores = $repo=$this->getDoctrine()->getRepository(Proveedores::class)->findAll();
     //   $conceptos = $repo=$this->getDoctrine()->getRepository(Conceptos::class)->findAll();
     //   $comprobantes = $repo=$this->getDoctrine()->getRepository(Comprobantes::class)->findAll();
        $socios = $repo=$this->getDoctrine()->getRepository(Socios::class)->findAll();
        //crea los formularios para las cajas y las cajas de bancos
        $caja_detalle = new CajasDetalle();
        $form = $this->createForm(CajasDetalleType::class, $caja_detalle);

        $repo=$this->getDoctrine()->getRepository(CajasDetalle::class);
        $detalles = $repo->findAll();
       
        return $this->render('gestionFondosBundle:Cajas:caja_detalle.html.twig', array(
            'form' => $form->createView(),
            'detalles'=>$detalles,
            'socios'=>$socios,
       //     'proveedores'=>$proveedores,
       //     'conceptos'=>$conceptos,
       //     'comprobantes'=>$comprobantes
            )
        );
    }

}
