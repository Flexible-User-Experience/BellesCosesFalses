<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExposicioController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-EXP'));
        return $this->render('BellesCosesFalsesMainBundle:Exposicio:index.html.twig', array(
            'page' => $page,
        ));
    }
}
