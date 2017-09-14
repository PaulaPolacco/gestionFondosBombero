<?php

namespace gestionFondosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ComprobantesController extends Controller
{
    /**
     * @Route("/comprobantes", name="comprobantes")
     */
    public function indexAction()
    {
        return $this->render('gestionFondosBundle:Comprobantes:index.html.twig');
    }

}
