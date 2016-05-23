<?php

namespace Udec\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProyectoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaInicio', DateType::class, array('input'  => 'datetime','widget' => 'single_text', 'attr' => array('class' => 'form-control')))
            ->add('nombre', null, array('attr' => array('class'=>"form-control")))
            ->add('resumen', null, array('attr' => array('class'=>"form-control")))
            ->add('documento',FileType::class,array('data_class' => null,
                'property_path' => 'documento' ,
                'attr' => array('class'=>"form-control")))
            ->add('director', null, array('attr' => array('class'=>"form-control")))
            ->add('participantes', EntityType::class, array( 'class' => 'UdecHomeBundle:User',
                //'property' => 'name',
                "choice_label" => "nombreCompleto",
                'multiple' => true,
                'expanded' => true,
                'attr' => array('class'=>"form-control")))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Udec\HomeBundle\Entity\Proyecto'
        ));
    }
}
