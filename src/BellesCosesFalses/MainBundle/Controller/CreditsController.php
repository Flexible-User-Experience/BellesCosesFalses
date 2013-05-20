<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreditsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '005-CRE'));
        return $this->render('BellesCosesFalsesMainBundle:Credits:index.html.twig', array(
            'page' => $page,
        ));
    }
}
