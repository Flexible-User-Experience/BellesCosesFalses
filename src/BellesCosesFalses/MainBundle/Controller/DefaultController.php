<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BellesCosesFalsesMainBundle:Default:provisional.html.twig'); // PROVISIONAL - TEMPORALMENT ACTIVAT
        // return $this->render('BellesCosesFalsesMainBundle:Default:index.html.twig'); DEFINITIU - TEMPORALMENT DESACTIVAT
    }

    public function sitemapAction()
    {
        $urls = array();
        $hostname = $this->getRequest()->getHost();
        array_push($urls, array('loc' => $this->get('router')->generate('home'), 'changefreq' => 'weekly', 'priority' => '1.0'));
        array_push($urls, array('loc' => $this->get('router')->generate('exposicio'), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('apartats'), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('artistes'), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('agraiments'), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('credits'), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('blog'), 'changefreq' => 'daily', 'priority' => '1.0'));
        return $this->render('FluxPageBundle:Global:sitemap.xml.twig', array(
            'urls' => $urls,
            'hostname' => $hostname,
        ));
    }
}
