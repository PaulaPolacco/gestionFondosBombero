<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use gestionFondosBundle\Entity\Proveedores;

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
     * @Route("/proveedores/nuevo", name="nuevo_proveedor")
     */
    public function nuevoProveedor(Request $request)
    {
        
        if ($request->isMethod('POST')){
            $nuevo_proveedor = new Proveedores();

            $request->getSession()
            ->getFlashBag()
            ->add('success', 'Proveedor creado correctamente!');
            //return $this->render('gestionFondosBundle:Proveedores:index.html.twig');
            return $this->redirectToRoute('proveedores');
        }
        return $this->render('gestionFondosBundle:Proveedores:nuevo_proveedor.html.twig');
    }
}
