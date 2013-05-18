<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AgraimentsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '003-AGR'));
        return $this->render('BellesCosesFalsesMainBundle:Agraiments:index.html.twig', array(
            'page' => $page,
        ));
    }
}
