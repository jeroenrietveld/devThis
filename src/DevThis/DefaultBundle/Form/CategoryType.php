<?php

namespace DevThis\DefaultBundle\Form;

use DevThis\DefaultBundle\Entity\Category;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Form\Form;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'required' => true,
            ))
            ->add('content', 'ckeditor', array(
            ))
        ;
    }
    public function getName()
    {
        return 'dev_this_default_bundle_category';
    }
}
