<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use gestionFondosBundle\Entity\Personas;
use gestionFondosBundle\Form\PersonasType;

class PersonasController extends Controller
{
    /**
     * @Route("/home")
     */
    public function indexAction()
    {
        return $this->render('gestionFondosBundle:Personas:nueva_persona.html.twig');
    }

    /**
     * @Route("/persona/nueva", name="nueva_persona")
     */
    public function nuevaPersona(Request $request)
    {
        $persona = new Personas();
        $form = $this->createForm(PersonasType::class, $persona);

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form->isValid()){
                $persona->setNombres($form->get("nombres")->getData());
                $persona->setApellido($form->get("apellido")->getData());
                $persona->setDni($form->get("dni")->getData());
                $persona->setCuil($form->get("cuil")->getData());
                $persona->setEmail($form->get("email")->getData());
                $persona->setTelefono($form->get("telefono")->getData());
                $persona->setDomicilio($form->get("domicilio")->getData());
                $persona->setLocalidad($form->get("localidad")->getData());

                //guarda los datos en la BD
                $em = $this->getDoctrine()->getEntityManager();
                try{
                    $em->persist($persona);
                    $flush = $em->flush();
                }catch(\Exception $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Uno de los campos claves se encuentra duplicado ');
                    return $this->render('gestionFondosBundle:Personas:nueva_persona.html.twig',
                    array('form' => $form->createView()));
                }

                //verifica si la operacion de almacenar en la BD se completo de manera correcta
                if($flush == null)
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Persona creada correctamente!');
                else{
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'La persona no pudo ser creada!');
                }
                //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
                return $this->redirectToRoute('nueva_persona');
            }
         }
        return $this->render('gestionFondosBundle:Personas:nueva_persona.html.twig',array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/persona/modificar/{id}")
     */
     public function modificarPersona(Request $request, $id)
     {
        $repo = $this->getDoctrine()->getRepository(Personas::class);
        $persona = $repo->findOneById($id);

        $form = $this->createForm(PersonasType::class, $persona);
 
        if($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form->isValid()){
                try{
                    $repo->updatePersona($persona);
                }catch(\Exeption $e){
                    $request->getSession()
                    ->getFlashBag()
                    ->add('danger', 'Error al modificar los datos de la persona');
                    return $this->render('gestionFondosBundle:Personas:modificar_persona.html.twig',
                    array('form' => $form->createView()));
                }

                $request->getSession()
                ->getFlashBag()
                ->add('success', 'Los datos de la persona fueron actualizados');
                
                //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
                return $this->redirectToRoute('nueva_persona');
            }
        }
        return $this->render('gestionFondosBundle:Personas:modificar_persona.html.twig',array(
            'form' => $form->createView()
        ));
    }
}
