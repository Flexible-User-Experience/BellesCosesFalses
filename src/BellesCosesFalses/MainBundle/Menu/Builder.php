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
        $menu->addChild('ARTISTES', array('route' => 'artistes'));
        $menu->addChild('AGRAÏMENTS', array('route' => 'agraiments'));
        $menu->addChild('BLOG', array('route' => 'blog'));
        $menu->addChild('CRÈDITS', array('route' => 'credits'));
        return $menu;
    }
}