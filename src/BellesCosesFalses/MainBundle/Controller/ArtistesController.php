<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArtistesController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '003-ART'));
        return $this->render('BellesCosesFalsesMainBundle:Artistes:index.html.twig', array(
            'page' => $page,
        ));
    }
}
