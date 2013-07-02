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

    public function detailAction($year, $month, $day, $titleslug, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('FluxBlogBundle:Post')->find($id);
        if (!$post) throw $this->createNotFoundException("No existeix l'article " . $id);
        return $this->render('BellesCosesFalsesMainBundle:Blog:detail.html.twig', array(
            'post' => $post,
            'year' => $year,
            'month' => $month,
            'day' => $day,
            'titleslug' => $titleslug,
            'id' => $id,
        ));
    }
}
