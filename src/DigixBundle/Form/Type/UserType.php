<?php
namespace DigixBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
    	$builder->add('username','text');
    	$builder->add('website','text');
    	$builder->add('age','integer');
    	$builder->add('occupation','text');
        $builder->add('email', 'email');
        $builder->add('password','password');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DigixBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'flv';
    }
}