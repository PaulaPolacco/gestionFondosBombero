<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use gestionFondosBundle\Form\ConceptosType;
use gestionFondosBundle\Entity\Conceptos;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class ConceptosController extends Controller
{
    /**
     * @Route("/conceptos", name="conceptos")
     */
    public function indexAction()
    {
        return $this->render('gestionFondosBundle:Conceptos:index.html.twig');
    }

    /**
     * @Route("/concepto/nuevo", name="concepto_nuevo")
     */
    public function nuevoConcepto(Request $request)
    {

    	$concepto = new Conceptos();
    	$form  = $this->createForm(ConceptosType::class, $concepto);
        
        if($request->isMethod('POST')){
        	$form->handleRequest($request);
        	if ($form->isValid()) {
        		$concepto->setCodigo($form->get('codigo')->getData());
        		$concepto->setDescripcion($form->get('descripcion')->getData());
        		$concepto->setEstado('A');
        		
        		$em = $this->getDoctrine()->getEntityManager();
        		try {
        			$em->persist($concepto);
        			$flush= $em->flush();
        		}catch(UniqueConstraintViolationException $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Ya existe un concepto con ese códio');
                    return $this->render('gestionFondosBundle:Conceptos:nuevo_concepto.html.twig',
                    array('form' => $form->createView()));
                }

                                //verifica si la operacion de almacenar en la BD se completo de manera correcta
                if($flush == null)
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Concepto creado correctamente!');
                else{
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'El concepto no pudo ser creado!');
                }
                //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
                return $this->redirectToRoute('concepto_nuevo');
        	}

        }
        return $this->render('gestionFondosBundle:Conceptos:nuevo_concepto.html.twig',array('form' => $form->CreateView()));
    }

    /**
    * @Route("/concepto/modificar/{id}", name="concepto_modificar")
    */
    public function modificarConcepto(Request $request, $id)
    {
        //obtiene la caja a modificar
        $repo = $this->getDoctrine()->getRepository(Conceptos::class);
        $concepto = $repo->findOneById($id);

        $form = $this->createForm(ConceptosType::class, $concepto);

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form->isValid()){
                try{
                    $repo->updateCaja($concepto);
                }catch(\Exeption $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Error al modificar el concepto');
                    return $this->render('gestionFondosBundle:Conceptos:modificar_concepto.html.twig',
                    array('form' => $form->createView()));
                }
            }
        }
        return $this->render('gestionFondosBundle:Conceptos:modificar_concepto.html.twig',array(
            'form' => $form->createView()
        ));
    }

}
