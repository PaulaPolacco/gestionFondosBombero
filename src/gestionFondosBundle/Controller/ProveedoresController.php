<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use gestionFondosBundle\Entity\Proveedores;
use gestionFondosBundle\Form\ProveedoresType;
use gestionFondosBundle\Entity\Personas;

class ProveedoresController extends Controller
{
    /**
     * @Route("/proveedores", name="proveedores")
     */
    public function indexAction(Request $request)
    {
        $proveedores = $repo=$this->getDoctrine()->getRepository(Proveedores::class)->findAll();
        return $this->render('gestionFondosBundle:Proveedores:index.html.twig',array(
            'proveedores' => $proveedores
        ));
    }

    /**
     * @Route("/proveedor/nuevo", name="nuevo_proveedor")
     */
    public function nuevoProveedor(Request $request)
    {   
        $personas = $repo=$this->getDoctrine()->getRepository(Personas::class)->findAll();

        $proveedor = new Proveedores();
        $form= $this->createForm(ProveedoresType::class, $proveedor);

        if ($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form->isValid()){
                //si se selecciono una persona, la razon social es el nombre de la persona
                if($form->get("razonSocial")->getData() == null){
                    try{
                        $persona = $repo=$this->getDoctrine()->getRepository(Personas::class)->findById($form->get("persona")->getData())[0];
                    }catch(\Exception $e){
                        $request->getSession()
                        ->getFlashBag()
                        ->add('danger', 'La persona ingresada no existe');
                        return $this->render('gestionFondosBundle:Proveedores:nuevo_proveedor.html.twig',
                        array('form' => $form->createView(),
                                'personas' => $personas));
                    }
                    $proveedor->setRazonSocial($persona->getApellido());
                    $proveedor->setCuit('');
                    $proveedor->setDomicilio($persona->getDomicilio());
                    $proveedor->setLocalidad($persona->getLocalidad());
                    $proveedor->setEmailCorporativo($persona->getEmail());
                    $proveedor->setPersona($persona);
                }else{
                    $proveedor->setRazonSocial($form->get("razonSocial")->getData());    
                    $proveedor->setCuit($form->get("cuit")->getData());
                    $proveedor->setDomicilio($form->get("domicilio")->getData());
                    $proveedor->setLocalidad($form->get("localidad")->getData());
                    $proveedor->setEmailCorporativo($form->get("emailCorporativo")->getData());
                }
                
                $proveedor->setTelefonoFax($form->get("telefonoFax")->getData());
                $proveedor->setBanco($form->get("banco")->getData());
                $proveedor->setNroCuenta($form->get("nroCuenta")->getData());
                $proveedor->setCbu($form->get("cbu")->getData());
                $proveedor->setDatosCheque($form->get("datosCheque")->getData());

                //guarda los datos en la BD
                $em = $this->getDoctrine()->getEntityManager();
                try{
                    $em->persist($proveedor);
                    $flush = $em->flush();
                }catch(\Exception $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Uno de los datos ingresados es incorrecto');
                    return $this->render('gestionFondosBundle:Proveedores:nuevo_proveedor.html.twig',
                    array('form' => $form->createView(),
                    'personas' => $personas));
                }

                //verifica si la operacion de almacenar en la BD se completo de manera correcta
                if($flush == null)
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Proveedor creado correctamente!');
                else{
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'El proveedor no pudo ser creado!');
                }
                //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
                return $this->redirectToRoute('proveedores');
            }
         }
        return $this->render('gestionFondosBundle:Proveedores:nuevo_proveedor.html.twig',array(
            'form' => $form->createView(),
            'personas' => $personas
        ));
    }
}
