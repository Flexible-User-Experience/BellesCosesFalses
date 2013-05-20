<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('FluxBlogBundle:Post')->getAllActivePostsSortedByDate();
        return $this->render('BellesCosesFalsesMainBundle:Blog:index.html.twig', array(
            'posts' => $posts,
        ));
    }
}
