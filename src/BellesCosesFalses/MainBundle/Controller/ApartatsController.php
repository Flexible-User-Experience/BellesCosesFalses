<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApartatsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '002-APA'));
        return $this->render('BellesCosesFalsesMainBundle:Apartats:index.html.twig', array(
            'page' => $page,
        ));
    }
}
