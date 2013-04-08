<?php
namespace DevThis\DefaultBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Translation\TranslatorInterface;

class MenuBuilder extends ContainerAware
{
	public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $posts = $options['category']->getPosts();

        foreach($posts as $post) {
            $menu->addChild($post->getName(), 
                array('route' => 'dev_this_default_homepage_post', 'routeParameters' => array('post' => $post->getId())
            ));
        }

        return $menu;
    }

    public function adminMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->addChild('Admin', array('route' => 'dev_this_admin_index'));
        $menu->addChild('Categories', array('route' => 'dev_this_admin_categories'));
        $menu->addChild('Posts', array('route' => 'dev_this_admin_posts'));

        return $menu;
    }
}