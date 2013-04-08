<?php

namespace DevThis\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DevThis\DefaultBundle\Entity\Category,
	DevThis\DefaultBundle\Entity\Post;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DevThisDefaultBundle:Default:index.html.twig');
    }

    public function menuRenderAction()
    {
    	$em 		= $this->getDoctrine()->getManager();
    	$categories = $em->getRepository('DevThisDefaultBundle:Category')->findAll();

        return $this->render('DevThisDefaultBundle:Default:menu.html.twig', array(
        	'categories' => $categories
        ));
    }

    public function categoryAction($category)
    {
    	$em = $this->getDoctrine()->getManager();
    	$category = $em->getRepository('DevThisDefaultBundle:Category')->find($category);

    	if(!$category instanceof Category) {
    		throw $this->createNotFoundException('Could not find category.');
    	}

    	return $this->render('DevThisDefaultBundle:Default:category.html.twig', array(
    		'category' => $category
    	));
    }

    public function postAction($post)
    {
		$em = $this->getDoctrine()->getManager();
    	$post = $em->getRepository('DevThisDefaultBundle:Post')->find($post);

    	if(!$post instanceof Post) {
    		throw $this->createNotFoundException('Could not find category.');
    	}

    	return $this->render('DevThisDefaultBundle:Default:post.html.twig', array(
    		'post' => $post
    	));
    }
}
