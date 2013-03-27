<?php

namespace DevThis\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('DevThisDefaultBundle:Admin:index.html.twig');
    }
}
