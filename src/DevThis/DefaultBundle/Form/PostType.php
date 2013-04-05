<?php

namespace DevThis\DefaultBundle\Form;

use DevThis\DefaultBundle\Entity\Post;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Form\Form;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'required' => true,
            ))
            
            ->add('category', 'entity', array(
                'class'    => 'DevThisDefaultBundle:Category',
                'property' => 'name',
            ))
        ;
    }
    public function getName()
    {
        return 'dev_this_default_bundle_post';
    }
}
