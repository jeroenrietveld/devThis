<?php

namespace DevThis\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DevThisDefaultBundle:Default:index.html.twig');
    }
}
