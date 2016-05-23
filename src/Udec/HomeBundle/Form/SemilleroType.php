<?php

namespace Udec\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class SemilleroType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array( 'attr' => array('class' => 'form-control')))
            ->add('grupo', EntityType::class, array('class' => 'UdecHomeBundle:Grupo', 'choice_label' => 'nombre', 'attr' => array('class' => 'form-control',)))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Udec\HomeBundle\Entity\Semillero'
        ));
    }
}
