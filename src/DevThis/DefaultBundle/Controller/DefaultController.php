<?php

namespace DevThis\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DevThis\DefaultBundle\Entity\Catergory,
	DevThis\DefaultBundle\Entity\Post;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em 		= $this->getDoctrine()->getManager();
    	$categories = $em->getRepository('DevThisDefaultBundle:Category')->findAll();

        return $this->render('DevThisDefaultBundle:Default:index.html.twig', array(
        	'categories' => $categories
        ));
    }
}
