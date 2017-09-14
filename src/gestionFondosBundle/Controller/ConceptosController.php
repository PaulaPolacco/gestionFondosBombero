<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ConceptosController extends Controller
{
    /**
     * @Route("/conceptos", name="conceptos")
     */
    public function indexAction()
    {
        return $this->render('gestionFondosBundle:Conceptos:index.html.twig');
    }

}
