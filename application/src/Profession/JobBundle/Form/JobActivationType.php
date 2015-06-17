<?php

namespace Profession\JobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * JobActivationType
 */
class JobActivationType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', 'hidden');
        $builder->add('activate', 'submit');
    }

    public function getName()
    {
        return 'job_activation';
    }
}
