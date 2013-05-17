<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArtistesController extends Controller
{
    public function indexAction()
    {
        return $this->render('BellesCosesFalsesMainBundle:Artistes:index.html.twig');
    }
}
