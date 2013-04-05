<?php

namespace DevThis\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DevThis\DefaultBundle\Entity\Category,
    DevThis\DefaultBundle\Entity\Post;

use DevThis\DefaultBundle\Form\CategoryType,
    DevThis\DefaultBundle\Form\PostType;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('DevThisDefaultBundle:Admin:index.html.twig');
    }

    public function categoriesAction()
    {
        $em         = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('DevThisDefaultBundle:Category')->findAll();

    	return $this->render('DevThisDefaultBundle:Admin:categories.html.twig', array('categories' => $categories));
    }

    public function postsAction()
    {
        $em    = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('DevThisDefaultBundle:Post')->findAll();

    	return $this->render('DevThisDefaultBundle:Admin:posts.html.twig', array('posts' => $posts));
    }

    public function createCategoryAction()
    {
        $category = new Category();
        $form     = $this->createForm(new CategoryType(), $category);

        if("POST" == $this->getRequest()->getMethod()) {
            $form->bindRequest($this->getRequest());

            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $this->get('session')->getFlashBag()->add('success', 'category added');

                $em->persist($category);
                $em->flush();

                $url  = $this->generateUrl('dev_this_admin_categories');

                return $this->redirect($url);
            }
        }

        return $this->render('DevThisDefaultBundle:Admin:createCategory.html.twig', array('form' => $form->createView()));
    }

    public function createPostAction()
    {
        $post = new Post();
        $form = $this->createForm(new PostType(), $post);

        if("POST" == $this->getRequest()->getMethod()) {
            $form->bindRequest($this->getRequest());

            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $this->get('session')->getFlashBag()->add('success', 'post added');

                $em->persist($post);
                $em->flush();

                $url  = $this->generateUrl('dev_this_admin_posts');

                return $this->redirect($url);
            }
        }

        return $this->render('DevThisDefaultBundle:Admin:createPost.html.twig', array('form' => $form->createView()));
    }
}
