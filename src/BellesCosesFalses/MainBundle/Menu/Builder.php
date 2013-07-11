<?php
namespace BellesCosesFalses\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Builder extends ContainerAware
{
    public function main_menu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine')->getManager();
        $posts = $em->getRepository('FluxBlogBundle:Post')->getAllActivePostsSortedByDate();
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('EXPOSICIÓ', array('route' => 'exposicio'));
        //$menu->addChild('APARTATS', array('route' => 'apartats'));
        //$menu->addChild('ARTISTES', array('route' => 'artistes'));
        $blog = $menu->addChild('BLOG', array('route' => 'blog'));
        foreach ($posts as $post) {
            $blog->addChild($post->getTitle(), array('route' => 'blog_detail', 'routeParameters' => array(
                'id' => 1,
                'year' => 2,
                'month' => 3,
                'day' => 4,
                'titleslug' => 's')));
        }
        $menu->addChild('CONCURS', array('route' => 'agraiments'));
        $menu->addChild('CRÈDITS', array('route' => 'credits'));
        return $menu;
    }
}