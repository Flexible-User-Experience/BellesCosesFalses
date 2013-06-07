<?php
namespace BellesCosesFalses\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Builder extends ContainerAware
{
    public function main_menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('EXPOSICIÓ', array('route' => 'exposicio'));
        $menu->addChild('APARTATS', array('route' => 'apartats'));
        $menu->addChild('ARTISTES', array('route' => 'artistes'));
        $menu->addChild('CONCURS INSTAGRAM', array('route' => 'agraiments'));
        $menu->addChild('CRÈDITS I AGRAÏMENTS', array('route' => 'credits'));
        $menu->addChild('BLOG', array('route' => 'blog'));
        return $menu;
    }
}