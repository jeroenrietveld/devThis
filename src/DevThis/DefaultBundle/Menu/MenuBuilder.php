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
            $menu->addChild($post->getName(), array('route' => 'dev_this_default_homepage'));
        }

        return $menu;
    }
}