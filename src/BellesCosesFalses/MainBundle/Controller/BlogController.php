<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$posts = $em->getRepository('FluxBlogBundle:Post')->getAllActivePostsSortedByDate();

        $dql   = "SELECT p FROM FluxBlogBundle:Post p WHERE p.isActive = 1 ORDER BY p.postDate DESC";
        $query = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1) /*page number*/,
            5 /*limit per page*/
        );

        return $this->render('BellesCosesFalsesMainBundle:Blog:index.html.twig', array(
            'posts' => $pagination,
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
