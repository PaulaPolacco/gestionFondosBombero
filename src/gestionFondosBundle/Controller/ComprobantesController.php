<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use gestionFondosBundle\Form\ComprobantesType;
use gestionFondosBundle\Entity\Comprobantes;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class ComprobantesController extends Controller
{
    /**
     * @Route("/comprobantes", name="comprobantes")
     */
    public function indexAction()
    {
        $repo=$this->getDoctrine()->getRepository(Comprobantes::class);
        $comprobantes = $repo->findAll();
        return $this->render('gestionFondosBundle:Comprobantes:index.html.twig',array('comprobantes'=>$comprobantes));
    }

    /**
     * @Route("/comprobante/nuevo", name="comprobante_nuevo")
     */
    public function nuevoComprobante(Request $request)
    {

    	$comprobante = new Comprobantes();
    	$form  = $this->createForm(ComprobantesType::class, $comprobante);
        
        if($request->isMethod('POST')){
        	$form->handleRequest($request);
        	if ($form->isValid()) {
        		$comprobante->setCodigo($form->get('codigo')->getData());
        		$comprobante->setDescripcion($form->get('descripcion')->getData());
        		$comprobante->setEstado('A');
        		
        		$em = $this->getDoctrine()->getEntityManager();
        		try {
        			$em->persist($comprobante);
        			$flush= $em->flush();
        		}catch(UniqueConstraintViolationException $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Ya existe un comprobante con ese código');
                    return $this->render('gestionFondosBundle:Comprobantes:nuevo_comprobante.html.twig',
                    array('form' => $form->createView()));
                }

                                //verifica si la operacion de almacenar en la BD se completo de manera correcta
                if($flush == null)
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'comprobante creado correctamente!');
                else{
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'El comprobante no pudo ser creado!');
                }
                //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
                return $this->redirectToRoute('comprobantes');
        	}

        }
        return $this->render('gestionFondosBundle:Comprobantes:nuevo_comprobante.html.twig',array('form' => $form->CreateView()));
    }


}
