<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AgraimentsController extends Controller
{
    public function indexAction()
    {
        return $this->render('BellesCosesFalsesMainBundle:Agraiments:index.html.twig');
    }
}
