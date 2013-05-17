<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExposicioController extends Controller
{
    public function indexAction()
    {
        return $this->render('BellesCosesFalsesMainBundle:Exposicio:index.html.twig');
    }
}
