<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use gestionFondosBundle\Entity\Proveedores;
use gestionFondosBundle\Form\ProveedoresType;

class ProveedoresController extends Controller
{
    /**
     * @Route("/proveedores", name="proveedores")
     */
    public function indexAction(Request $request)
    {
        return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
    }

    /**
     * @Route("/proveedor/nuevo", name="nuevo_proveedor")
     */
    public function nuevoProveedor(Request $request)
    {   
        $proveedor = new Proveedores();
        $form= $this->createForm(ProveedoresType::class, $proveedor);
        if ($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form->isValid()){
                //si se selecciono una persona, la razon social es el nombre de la persona
                if($form->get("razonSocial")->getData() == null){
                    $proveedor->setRazonSocial($form->get("persona")->getData());
                    $proveedor->setCuit('');                    
                }else{
                    $proveedor->setRazonSocial($form->get("razonSocial")->getData());    
                    $proveedor->setCuit($form->get("cuit")->getData());
                }

                $proveedor->setEmailCorporativo($form->get("emailCorporativo")->getData());
                $proveedor->setDomicilio($form->get("domicilio")->getData());
                $proveedor->setLocalidad($form->get("localidad")->getData());
                $proveedor->setTelefonoFax($form->get("telefonoFax")->getData());
                $proveedor->setBanco($form->get("banco")->getData());
                $proveedor->setNroCuenta($form->get("nroCuenta")->getData());
                $proveedor->setCbu($form->get("cbu")->getData());
                $proveedor->setDatosCheque($form->get("datosCheque")->getData());
                $proveedor->setPersona($form->get("persona")->getData());

                //guarda los datos en la BD
                $em = $this->getDoctrine()->getEntityManager();
                try{
                    $em->persist($proveedor);
                    $flush = $em->flush();
                }catch(\Exception $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Uno de los ingresados es incorrecto');
                    return $this->render('gestionFondosBundle:Proveedores:nuevo_proveedor.html.twig',
                    array('form' => $form->createView()));
                }

                //verifica si la operacion de almacenar en la BD se completo de manera correcta
                if($flush == null)
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Proveedor creada correctamente!');
                else{
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'La prveedor no pudo ser creada!');
                }
                //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
                return $this->redirectToRoute('nuevo_proveedor');
            }
         }
        return $this->render('gestionFondosBundle:Proveedores:nuevo_proveedor.html.twig',array(
            'form' => $form->createView()
        ));
    }
}
